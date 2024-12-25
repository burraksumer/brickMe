<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function miniMaker(Request $request)
    {
        return $request->user()->checkout(env('LEMON_SQUEEZY_MINI_VARIANT_ID'))
            ->redirectTo(route('dashboard'));
    }

    public function starter(Request $request)
    {
        return $request->user()->checkout(env('LEMON_SQUEEZY_STARTER_VARIANT_ID'))
            ->redirectTo(route('dashboard'));
    }

    public function pro(Request $request)
    {
        return $request->user()->checkout(env('LEMON_SQUEEZY_PRO_VARIANT_ID'))
            ->redirectTo(route('dashboard'));
    }
}
