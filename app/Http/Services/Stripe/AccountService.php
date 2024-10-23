<?php

namespace App\Http\Services\Stripe;

class AccountService
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient(config('stripe.stripe.secret'));
    }

    public function createAccount()
    {
        return $this->stripe->accounts->create([
            'controller' => [
                'losses' => ['payments' => 'application'],
                'fees' => ['payer' => 'application'],
                'stripe_dashboard' => ['type' => 'express'],
            ],
        ]);
    }

    public function createAccountLink($accountId)
    {
        return $this->stripe->accountLinks->create([
            'account' => $accountId,
            'refresh_url' => 'https://example.com/reauth',
            'return_url' => 'https://example.com/return',
            'type' => 'account_onboarding',
        ]);
    }
}
