<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function showPurchases()
    {
        $user = Auth::user();
        $orders = $user->orders;

        return view('user.pages.profile.purchases', [
            'orders' => $orders,
        ]);
    }

    public function showPurchase(Order $id)
    {
        return view('user.pages.profile.purchase', [
            'order' => $id,
        ]);
    }
}
