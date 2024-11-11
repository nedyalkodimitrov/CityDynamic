<?php

namespace App\Http\Utils;

use App\Models\ShoppingCart;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Container\Container;

class Cart
{
    private static $instance = null;
    private $items = [];

    private $total = 0;

    private $totalItems = 0;

    public function __construct(User $user = null)
    {
        if (session('cart') === null) {
            Ticket::where('user_id', $user?->id)->get()->each(function ($ticket) {
                $this->items[$ticket->id] = $ticket;
                $this->total += $ticket->price;
                $this->totalItems++;
            });
            session(['cart' => $this->items]);
            session(['total' => $this->total]);
            session(['totalItems' => $this->totalItems]);
        }else{
            $this->items = session('cart', []);
            $this->total = session('total', 0);
            $this->totalItems = session('totalItems', 0);

        }
    }
    public static function getInstance(User $user = null)
    {
        if (self::$instance === null) {
            self::$instance = new self($user);
        }
        return self::$instance;
    }
    public function add(Ticket $item)
    {
        $this->items[$item->id] = $item;
        $this->total += $item->price;
        $this->totalItems++;
        session(['cart' => $this->items]);
        session(['total' => $this->total]);
        session(['totalItems' => $this->totalItems]);
    }

    public function remove(Ticket $ticket)
    {
        $this->total -= $this->items[$ticket->id]->price;
        $this->totalItems--;
        unset($this->items[$ticket->id]);
        session(['cart' => $this->items]);
        session(['total' => $this->total]);
        session(['totalItems' => $this->totalItems]);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getTotalItems()
    {
        return $this->totalItems;
    }

    public function clear()
    {
        session(['cart' => []]);
        session(['total' => 0]);
        session(['totalItems' => 0]);
    }

    public function convertToStripeData()
    {
        $lineItems = [];
        foreach ($this->items as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => config('stripe.currency'),
                    'unit_amount' => $item->price * 100,
                    'product_data' => [
                        'name' => $item->startPoint->station->city->name . ' - ' . $item->endPoint->station->city->name,
                        'description' => 'Тръва '. $item->course->start_time. ' часа',
                        ],
                ],
                'quantity' => 1,
            ];
        }
        return $lineItems;
    }
}
