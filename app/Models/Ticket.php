<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class, 'course', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function startPoint()
    {
        return $this->belongsTo(DestinationPoint::class, 'startPoint', 'id');
    }

    public function endPoint()
    {
        return $this->belongsTo(DestinationPoint::class, 'endPoint', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order', 'id');
    }
}
