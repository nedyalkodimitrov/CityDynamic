<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ShoppingCartRepository;
use App\Http\Services\PriceCalculatorService;
use App\Http\Utils\Cart;
use App\Models\Course;
use App\Models\Order;
use App\Models\ShoppingCart;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function showCart()
    {
        return view('user.pages.cart.cart');
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

    public function addToCart($courseId, $startPointId, $endPointId, PriceCalculatorService $priceCalculatorService)
    {
        $user = Auth::user();
        $course = Course::find($courseId);

        $price = $priceCalculatorService->calculatePrice($course, $startPointId, $endPointId);
        Ticket::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'start_point_id' => $startPointId,
            'end_point_id' => $endPointId,
            'price' => $price,
        ]);

        return redirect()->back();
    }
}
