<?php

namespace App\Http\Services\Stripe;

class Stripe
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient(config('stripe.stripe.secret'));
    }
}
