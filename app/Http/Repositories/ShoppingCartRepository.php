<?php

namespace App\Http\Repositories;

use App\Models\ShoppingCart;

class ShoppingCartRepository {
    public static function getShoppingCart($user)
    {
        return ShoppingCart::where('user', $user->id)->whereNull('order')->get()->with('ticket');
    }
}
