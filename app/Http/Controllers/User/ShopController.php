<?php

namespace App\Http\Controllers\User;

use App\Http\Constants\StripeEventConstant;
use App\Http\Controllers\Controller;
use App\Http\Repositories\ShoppingCartRepository;
use App\Http\Services\PriceCalculatorService;
use App\Http\Services\Stripe\PaymentService;
use App\Http\Services\Stripe\ProductService;
use App\Http\Services\Stripe\SessionService;
use App\Http\Services\Stripe\TransferService;
use App\Http\Utils\Cart;
use App\Models\Course;
use App\Models\Order;
use App\Models\ShoppingCart;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function showCart()
    {
        return view('user.pages.cart.cart');
    }
    public function removeFromCart(Ticket $ticket)
    {
        $ticket->delete();

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

    public function showCheckout()
    {
        return view('user.pages.cart.checkout');
    }

    public function createStripeSession(SessionService $stripeSession)
    {
        $stripeData = Cart::getInstance()->convertToStripeData();
        return response()->json(['clientSecret' => $stripeSession->createSession($stripeData)->client_secret]);
    }

    public function checkout(Request $request, SessionService $stripeSession, ProductService $productService, TransferService $transferService)
    {
        $session = $stripeSession->retrieveSession($request->session);
        $sessionLineItems = $stripeSession->retrieveSessionLineItems($request->session);
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'stripe_charge_id' => $session->payment_intent,
            'ticket_numbers' => count($sessionLineItems->data),
            'total_price' => $session->amount_total / 100,
        ]);

        foreach ($sessionLineItems->data as $lineItem) {
            $product = $productService->retrieveProduct($lineItem->price->product);
            $ticketId = $product->metadata->ticket_id;
            $ticket = Ticket::find($ticketId);
            $ticket->order_id = $order->id;
            $ticket->save();

            $stripeAccountId = $ticket->course->destination->company->stripe_account_id;
            $transferService->createTransfer($lineItem->amount_total, $stripeAccountId,'ORDER100');
        }

        return redirect()->route('user.showPurchases');
    }

    public function stripeWebhook(PaymentService $paymentService)
    {
        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];

        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, config('stripe.webhook.secret')
        );
        $eventObject = $event->data->object;

        if ($event->type == StripeEventConstant::CHECKOUT_SESSION_COMPLETED) {
            $paymentService->retrievePaymentIntent($eventObject->payment_intent);
        }

        exit();
    }
}
