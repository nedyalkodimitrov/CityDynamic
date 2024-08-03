<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function getShoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class, 'order', 'id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
