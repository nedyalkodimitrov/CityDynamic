<?php

namespace App\Http\Repositories;

use App\Models\ShoppingCart;

class ShoppingCartRepository
{
    public static function getShoppingCart($user)
    {
        return ShoppingCart::where('user_id', $user->id)->get();
    }
}
