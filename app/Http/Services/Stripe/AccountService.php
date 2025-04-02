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
            'refresh_url' => route('company.home'),
            'return_url' => route('company.handleStripeAccount'),
            'type' => 'account_onboarding',
        ]);
    }

    public function retrieveAccountLink($accountLinkId)
    {
        return $this->stripe->accounts->retrieve($accountLinkId, []);
    }

    public function createLoginLink($accountId)
    {
        return $this->stripe->accounts->createLoginLink($accountId, []);
    }
}
