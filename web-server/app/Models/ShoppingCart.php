<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class, 'order', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket', 'id');
    }
}
