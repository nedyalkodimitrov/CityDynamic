<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;
use App\Http\Services\Stripe\AccountService;

class StripeController extends Controller
{
    public function createAccount(AccountService $accountService)
    {
        $company = \Auth::user()->getCompany();
        $stripeAccount = $company->stripeAccount;
        if (! $stripeAccount) {
            $stripeAccount = $company->stripeAccount()->create([]);
        }

        if (! $stripeAccount->stripe_account_id) {
            $account = $accountService->createAccount();
            $stripeAccount->stripe_account_id = $account->id;
            $stripeAccount->save();
        }

        $stripeLink = $accountService->createAccountLink($stripeAccount->stripe_account_id);

        return redirect($stripeLink->url);
    }

    public function handleAfterAccountCreation(AccountService $accountService)
    {
        $company = \Auth::user()->getCompany();
        $stripeAccount = $company->stripeAccount;

        $stripeAccountLink = $accountService->retrieveAccountLink($stripeAccount->stripe_account_id);
        $stripeAccount->is_charges_enabled = $stripeAccountLink->charges_enabled;
        $stripeAccount->save();

        return redirect()->route('company.home');
    }

    public function openStripeDashboard(AccountService $accountService)
    {
        $stripeDashboardLink = $accountService->createLoginLink(\Auth::user()->getCompany()->stripeAccount->stripe_account_id);

        return redirect($stripeDashboardLink->url);
    }
}
