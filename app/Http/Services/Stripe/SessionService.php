<?php

namespace App\Http\Services\Stripe;

class SessionService
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient(config('stripe.stripe.secret'));
    }

    public function createSession($amount, $merchantId)
    {
        return $this->stripe->checkout->sessions->create([
            'mode' => 'payment',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'bgn',
                        'unit_amount' => $amount * 100,
                        'product_data' => [
                            'name' => 'name of the product',
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'payment_intent_data' => [
                'application_fee_amount' => config('stripe.fee.application_fee'),
                'transfer_data' => ['destination' => $merchantId],
            ],
            'ui_mode' => 'embedded',
            'return_url' => 'https://127.0.0.1:8000?session={CHECKOUT_SESSION_ID}',
        ]);
    }
}
