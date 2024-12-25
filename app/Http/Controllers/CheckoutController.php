<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    private function getLocationData(Request $request): array
    {
        $ip = $request->ip();
        $cacheKey = "location_data_{$ip}";
        
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }
        
        try {
            $response = Http::get("https://ipapi.co/{$ip}/json/");
            if ($response->successful()) {
                $data = $response->json();
                $locationData = [
                    'country' => $data['country'] ?? 'NL',
                    'postal' => $data['postal'] ?? '',
                ];
                
                Cache::put($cacheKey, $locationData, 604800);
                return $locationData;
            }
            
            Log::info('IP geolocation defaulting to NL', [
                'reason' => 'API request not successful'
            ]);
        } catch (\Exception $e) {
            Log::info('IP geolocation defaulting to NL', [
                'reason' => 'API request failed'
            ]);
        }
        
        $default = ['country' => 'NL', 'postal' => '']; 
        Cache::put($cacheKey, $default, 604800);
        return $default;
    }

    public function miniMaker(Request $request)
    {
        $location = $this->getLocationData($request);
        
        return $request->user()
            ->checkout(env('LEMON_SQUEEZY_MINI_VARIANT_ID'))
            ->withBillingAddress($location['country'], $location['postal'])
            ->redirectTo(route('dashboard'));
    }

    public function starter(Request $request)
    {
        $location = $this->getLocationData($request);
        
        return $request->user()
            ->checkout(env('LEMON_SQUEEZY_STARTER_VARIANT_ID'))
            ->withBillingAddress($location['country'], $location['postal'])
            ->redirectTo(route('dashboard'));
    }

    public function pro(Request $request)
    {
        $location = $this->getLocationData($request);
        
        return $request->user()
            ->checkout(env('LEMON_SQUEEZY_PRO_VARIANT_ID'))
            ->withBillingAddress($location['country'], $location['postal'])
            ->redirectTo(route('dashboard'));
    }
}
