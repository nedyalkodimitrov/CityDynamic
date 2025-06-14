<?php

namespace App\Http\Constants;

enum StripeEventConstant
{
    const PAYMENT_INTENT_SUCCEEDED = 'payment_intent.succeeded';

    const CHECKOUT_SESSION_COMPLETED = 'checkout.session.completed';
}
