<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\StationController;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Destination;
use App\Models\Order;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showHome()
    {
        $user = Auth::user();
        if (Auth::check()) {
            $items = ShoppingCart::where("user", $user->id)->whereNull("order")->get();

        } else {
            $items = [];
        }
        $destinations = Destination::all();
        return view('user.pages.index')->with("destinations", $destinations)->with("itemsCount", count($items));
    }

    public function showCourses($id)
    {
        $user = Auth::user();
        $destination = Destination::find($id);
        if (Auth::check()) {
            $items = ShoppingCart::where("user", $user->id)->whereNull("order")->get();

        } else {
            $items = [];
        }

        $courses = $destination->getCourses;

        return view('user.pages.courses.courses')->with("courses", $courses)->with("destination", $destination)->with("itemsCount", count($items));
    }

    public function showCourse($id)
    {
        $user = Auth::user();
        if (Auth::check()) {
            $items = ShoppingCart::where("user", $user->id)->whereNull("order")->get();

        } else {
            $items = [];
        }

        $course = Course::find($id);
        $boughtCourseTicketNumbers = ShoppingCart::where("ticket", $course->getTicket->id)->count();
        return view('user.pages.courses.course')->with("course", $course)->with("itemsCount", count($items))->with("boughtCourseTicketNumbers", $boughtCourseTicketNumbers);
    }


    public function putInTheCart($courseId)
    {
        $user = Auth::user();
        $course = Course::find($courseId);

        $boughtCourseTicketNumbers = ShoppingCart::where("ticket", $course->getTicket->id)->count();
        if ($boughtCourseTicketNumbers < $course->getBus->seats){
            $cart = new ShoppingCart();
            $cart->user = $user->id;
            $cart->ticket = $course->getTicket->id;
            $cart->save();
        }

        return redirect()->back();

    }

    public function showCart()
    {
        $user = Auth::user();
        $items = ShoppingCart::where("user", $user->id)->whereNull("order")->get();

        return view("user.pages.cart.cart")->with("items", $items)->with("itemsCount", count($items));

    }

    public function buy()
    {
        $user = Auth::user();
        $items = ShoppingCart::where("user", $user->id)->whereNull("order")->get();
        $totalPrice = 0;
        foreach ($items as $item) {
            $totalPrice += $item->getTicket->price;
        }

        $order = new Order();
        $order->ticketNumbers = count($items);
        $order->totalPrice = $totalPrice;
        $order->user = $user->id;
        $order->save();

        foreach ($items as $item) {
            $item->order = $order->id;
            $item->save();
        }

        return redirect()->route("root");


    }

    public function showProfile()
    {
        $user = Auth::user();
        if (Auth::check()) {
            $items = ShoppingCart::where("user", $user->id)->whereNull("order")->get();

        } else {
            $items = [];
        }

        return view("user.pages.profile.profile")->with("itemsCount", count($items));


    }

    public function showPurchases()
    {
        $user = Auth::user();
        if (Auth::check()) {
            $items = ShoppingCart::where("user", $user->id)->whereNull("order")->get();

        } else {
            $items = [];
        }
        $orders = $user->getOrders;

        return view("user.pages.profile.purchases")->with("itemsCount", count($items))->with("orders", $orders);


    }
    public function showPurchase($orderId)
    {
        $user = Auth::user();
        if (Auth::check()) {
            $items = ShoppingCart::where("user", $user->id)->whereNull("order")->get();

        } else {
            $items = [];
        }
        $order = $user->getOrders()->where("id", $orderId)->first();

        return view("user.pages.profile.purchase")->with("itemsCount", count($items))->with("order", $order);


    }

    public function removeFromCart($itemId){
        ShoppingCart::find($itemId)->delete();
        return redirect()->back();
    }

}
