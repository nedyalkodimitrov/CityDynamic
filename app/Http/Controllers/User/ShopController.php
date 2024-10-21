<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ShoppingCartRepository;
use App\Models\Course;
use App\Models\Order;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function showCart()
    {
        $user = Auth::user();
        $items = ShoppingCart::where('user', $user->id)->whereNull('order')->get();

        return view('user.pages.cart.cart')->with('items', $items)->with('itemsCount', count($items));
    }

    public function buy()
    {
        $user = Auth::user();
        $items = ShoppingCartRepository::getShoppingCart($user);
        $totalPrice = 0;
        foreach ($items as $item) {
            $totalPrice += $item->ticket->price;
        }

        $order = new Order;
        $order->ticketNumbers = count($items);
        $order->totalPrice = $totalPrice;
        $order->user = $user->id;
        $order->save();

        foreach ($items as $item) {
            $item->order = $order->id;
            $item->save();
        }

        return redirect()->route('root');
    }

    public function showCheckout()
    {
        return view('user.pages.cart.checkout');
    }

    public function removeFromCart($itemId)
    {
        ShoppingCart::find($itemId)->delete();

        return redirect()->back();
    }

    public function addToCart($courseId)
    {
        $user = Auth::user();
        $course = Course::find($courseId);

        $boughtCourseTicketNumbers = ShoppingCart::where('ticket', $course->ticket->id)->count();
        if ($boughtCourseTicketNumbers < $course->getBus->seats) {
            $cart = new ShoppingCart;
            $cart->user = $user->id;
            $cart->ticket = $course->ticket->id;
            $cart->save();
        }

        return redirect()->back();
    }
}
