<?php

namespace App\Listeners;

use LemonSqueezy\Laravel\Events\OrderCreated;
use App\Models\User;

class LemonSqueezyEventListener
{
    public function handle(OrderCreated $event): void
    {
        $user = $event->billable;
        $orderData = $event->payload['data']['attributes'];
        $variantId = $orderData['first_order_item']['variant_id'];
        $variantName = $orderData['first_order_item']['variant_name'];

        // Add credits based on the package purchased
        $creditsToAdd = match ($variantId) {
            env('LEMON_SQUEEZY_MINI_VARIANT_ID') => 15,    // Mini Maker: 15 credits
            env('LEMON_SQUEEZY_STARTER_VARIANT_ID') => 35, // Starter: 35 credits
            env('LEMON_SQUEEZY_PRO_VARIANT_ID') => 150,    // Pro: 150 credits
            default => 0,
        };

        if ($creditsToAdd > 0) {
            $user->increment('credits', $creditsToAdd);
            
            // Record the transaction
            $user->creditTransactions()->create([
                'amount' => $creditsToAdd,
                'type' => 'purchase',
                'description' => "Credit purchase - {$variantName}"
            ]);
        }
    }
}
