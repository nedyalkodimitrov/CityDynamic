<?php

namespace App\Http\Services\Stripe;

class TransferService extends Stripe
{
    public function __construct()
    {
        parent::__construct();
    }
    public function createTransfer($amount, $merchantId, $transferGroup)
    {
        return $this->stripe->transfers->create([
            'amount' => $amount,
            'currency' => config('stripe.currency'),
            'destination' => $merchantId,
            'transfer_group' => $transferGroup,
        ]);
    }
}
