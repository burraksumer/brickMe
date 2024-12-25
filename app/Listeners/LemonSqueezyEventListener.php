<?php

namespace App\Listeners;

use LemonSqueezy\Laravel\Events\OrderCreated;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LemonSqueezyEventListener
{
    public function handle(OrderCreated $event): void
    {
        Log::info('Processing order', [
            'user_id' => $event->billable?->id,
            'variant_id' => $event->payload['data']['attributes']['first_order_item']['variant_id'],
            'variant_name' => $event->payload['data']['attributes']['first_order_item']['variant_name'],
            'order_id' => $event->payload['data']['id'],
            'status' => $event->payload['data']['attributes']['status'],
        ]);

        $user = $event->billable;
        if (!$user) {
            Log::error('No user found for order');
            return;
        }

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

        Log::info('Credits calculation', [
            'variant_id' => $variantId,
            'credits_to_add' => $creditsToAdd,
            'env_mini_id' => env('LEMON_SQUEEZY_MINI_VARIANT_ID'),
            'env_starter_id' => env('LEMON_SQUEEZY_STARTER_VARIANT_ID'),
            'env_pro_id' => env('LEMON_SQUEEZY_PRO_VARIANT_ID'),
        ]);

        if ($creditsToAdd > 0) {
            $user->increment('credits', $creditsToAdd);
            
            // Record the transaction
            $transaction = $user->creditTransactions()->create([
                'amount' => $creditsToAdd,
                'type' => 'purchase',
                'description' => "Credit purchase - {$variantName}"
            ]);

            Log::info('Credits added successfully', [
                'user_id' => $user->id,
                'credits_added' => $creditsToAdd,
                'transaction_id' => $transaction->id,
                'new_balance' => $user->credits,
            ]);
        } else {
            Log::warning('No credits added - variant ID not recognized', [
                'variant_id' => $variantId,
            ]);
        }
    }
}
