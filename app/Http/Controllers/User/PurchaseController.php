<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function showPurchases()
    {
        $user = Auth::user();
        $orders = $user->getOrders;

        return view('user.pages.profile.purchases', [
            'orders' => $orders,
        ]);
    }

    public function showPurchase($orderId)
    {
        $user = Auth::user();

        $order = $user->orders()->where('id', $orderId)->first();

        return view('user.pages.profile.purchase', [
            'order' => $order,
        ]);
    }
}
