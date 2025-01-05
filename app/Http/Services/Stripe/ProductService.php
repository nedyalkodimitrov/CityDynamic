<?php

namespace App\Http\Services\Stripe;

class ProductService extends Stripe
{
    public function __construct()
    {
        parent::__construct();
    }
    public function retrieveProduct($productId)
    {
        return $this->stripe->products->retrieve($productId);
    }
}
