<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function getCourse()
    {
        return $this->belongsTo(Course::class, 'course', 'id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function getStartPoint()
    {
        return $this->belongsTo(DestinationPoint::class, 'startPoint', 'id');
    }

    public function getEndPoint()
    {
        return $this->belongsTo(DestinationPoint::class, 'endPoint', 'id');
    }

    public function getOrder()
    {
        return $this->belongsTo(Order::class, 'order', 'id');
    }
}
