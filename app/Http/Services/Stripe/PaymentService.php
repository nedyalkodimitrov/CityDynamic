<?php

namespace App\Http\Services\Stripe;

class PaymentService extends Stripe
{
    public function __construct()
    {
        parent::__construct();
    }
    public function retrievePaymentIntent($paymentIntentId)
    {
        return $this->stripe->paymentIntents->retrieve($paymentIntentId, []);
    }
}
