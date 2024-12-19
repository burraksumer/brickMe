<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SabatinoMasala\Replicate\Replicate;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AvatarController extends Controller
{
    protected $replicate;
    protected const MODEL_VERSION = 'a06f32cc5a16042d1613e546bd52c66710a190a7a8ad01c5fe626cef306e42e1';
    protected const CAPTION_MODEL_VERSION = '499bec581d8f64060fd695ec0c34d7595c6824c4118259aa8b0788e0d2d903e1';

    public function __construct()
    {
        $this->replicate = new Replicate(env('REPLICATE_TOKEN'));
    }

    public function generate(Request $request)
    {
        $request->validate([
            'photo' => ['required', 'image', 'max:10240'] // 10MB max
        ]);

        $user = auth()->user();
        
        if (!$user->hasCredits()) {
            return redirect()->back()->withErrors(['error' => 'You do not have enough credits']);
        }

        $photo = $request->file('photo');
        $userId = auth()->id();
        $filename = time() . '_' . $photo->getClientOriginalName();
        
        // Create user directories if they don't exist
        Storage::disk('public')->makeDirectory("photos/{$userId}");
        Storage::disk('public')->makeDirectory("avatars/{$userId}");
        
        // Store original photo
        $originalPath = $photo->storeAs("photos/{$userId}", $filename, 'public');
        
        // Get public URL for the original photo
        $photoUrl = url(Storage::disk('public')->url($originalPath));
        
        try {
            // First, get the caption using BLIP-3
            $caption = $this->replicate->run(
                'zsxkib/blip-3:' . self::CAPTION_MODEL_VERSION,
                [
                    'image' => $photoUrl,
                    'caption' => true,
                    'system_prompt' => 'Write a caption for this image, i will use the caption for creating a Lego styled image. Description should be not repetitive but it should be describing the image in detail. Always say how many people in the photograph. Maximum 1 paragraph. Text should include that this is in LEGO style.',
                    'max_new_tokens' => 300,
                ]
            );

            if (!$caption) {
                throw new \Exception('Failed to generate image caption');
            }

            // Then use the caption in the Lego avatar generation
            $output = $this->replicate->run(
                'burraksumer/lego-avatar:' . self::MODEL_VERSION,
                [
                    'prompt' => 'LGO. Character as a 3D LEGO minifigure with vignette around the photo, 8K, studio lighting, blurry background. Do not put watermarks in any case. Caption for the image is: ' . $caption,
                    'image' => $photoUrl,
                    'model' => 'dev',
                    'num_inference_steps' => 28,
                    'guidance_scale' => 3.5,
                    'prompt_strength' => 0.95,
                    'num_outputs' => 1,
                    'aspect_ratio' => '1:1',
                    'output_format' => 'jpg',
                    'output_quality' => 100,
                    'go_fast' => false,
                    'megapixels' => '1',
                    'disable_safety_checker' => false,
                    'lora_scale' => 1,
                ],
                function($prediction) {
                    \Log::info('Avatar Generation Progress', $prediction->json());
                }
            );

            if (!empty($output) && isset($output[0])) {
                // Download the generated avatar
                $avatarContent = file_get_contents($output[0]);
                $avatarPath = "avatars/{$userId}/{$filename}";
                Storage::disk('public')->put($avatarPath, $avatarContent);

                if (!$user->deductCredit()) {
                    return redirect()->back()
                        ->withErrors(['error' => 'Failed to process credits'])
                        ->with(['error_type' => 'credit']);
                }

                return redirect()->back()->with([
                    'original' => route('avatar.show', ['path' => $originalPath]),
                    'avatar' => route('avatar.show', ['path' => $avatarPath]),
                    'success' => 'Avatar generated successfully!'
                ]);
            }

            throw new \Exception('Failed to generate avatar output');

        } catch (\Exception $e) {
            \Log::error('Avatar Generation Error', [
                'error' => $e->getMessage(),
                'user_id' => $userId,
                'filename' => $filename
            ]);
            
            return redirect()->back()
                ->withErrors(['error' => 'Something went wrong, we couldn\'t create the avatar. Please try again later.'])
                ->with(['error_type' => 'api']);
        }
    }

    public function show(string $path)
    {
        // Check if user has access to this image
        $userId = auth()->id();
        if (!str_contains($path, "/{$userId}/")) {
            abort(403);
        }

        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        return response()->file(Storage::disk('public')->path($path));
    }

    public function gallery()
    {
        $userId = auth()->id();
        $directory = "avatars/{$userId}";
        
        if (!Storage::disk('public')->exists($directory)) {
            return view('avatars.gallery', ['avatars' => collect()]);
        }
        
        $files = Storage::disk('public')->files($directory);
        if (empty($files)) {
            return view('avatars.gallery', ['avatars' => collect()]);
        }
        
        $avatars = collect($files)
            ->map(function($path) {
                return [
                    'avatar' => route('avatar.show', ['path' => $path]),
                    'original' => route('avatar.show', ['path' => str_replace('avatars', 'photos', $path)]),
                    'created_at' => Storage::disk('public')->lastModified($path),
                ];
            })
            ->sortByDesc('created_at')
            ->values();

        return view('avatars.gallery', ['avatars' => $avatars]);
    }
}
