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
                $data = [
                    'country' => $response['country'] ?? 'NL',
                    'postal' => $response['postal'] ?? ''
                ];
                
                Cache::put($cacheKey, $data, 604800);
                return $data;
            }
            
            Log::info('IP geolocation API request failed', [
                'status_code' => $response->status(),
                'response' => $response->json()
            ]);
            
        } catch (\Exception $e) {
            Log::error('IP geolocation exception', [
                'error' => $e->getMessage()
            ]);
        }
        
        return ['country' => 'NL', 'postal' => '']; 
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
