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
            $cachedData = Cache::get($cacheKey);
            // Add browser console log for cached data
            $logData = json_encode(['type' => 'cache_hit', 'data' => $cachedData]);
            echo "<script>console.log('Location Data:', {$logData});</script>";
            return $cachedData;
        }
        
        try {
            $response = Http::get("https://ipapi.co/{$ip}/json/");
            
            // Add browser console log for API response
            $logData = json_encode([
                'ip' => $ip,
                'status' => $response->status(),
                'body' => $response->json()
            ]);
            echo "<script>console.log('API Response:', {$logData});</script>";

            if ($response->successful()) {
                $data = [
                    'country' => $response['country'] ?? 'NL',
                    'postal' => $response['postal'] ?? ''
                ];
                
                Cache::put($cacheKey, $data, 604800);
                return $data;
            }
            
            // Log error to browser console
            echo "<script>console.error('API request failed:', {$response->status()});</script>";
            
        } catch (\Exception $e) {
            // Log error to browser console
            $errorMsg = json_encode($e->getMessage());
            echo "<script>console.error('Geolocation error:', {$errorMsg});</script>";
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
