<?php

namespace App\Http\Services\Stripe;

class SessionService extends Stripe
{
    public function __construct()
    {
        parent::__construct();
    }

    public function createSession($lineItems)
    {
        return $this->stripe->checkout->sessions->create([
            'mode' => 'payment',
            'line_items' => $lineItems,
            'payment_intent_data' => ['transfer_group' => 'ORDER100'],
            'ui_mode' => 'embedded',
            'return_url' => route('checkout.proceed').'?session={CHECKOUT_SESSION_ID}',
        ]);
    }
}
