<?php

namespace App\Http\Services\Stripe;

class AccountService extends Stripe
{
    public function __construct()
    {
        parent::__construct();
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
