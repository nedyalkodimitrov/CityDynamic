<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'start_point_id',
        'end_point_id',
        'price',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function startPoint()
    {
        return $this->belongsTo(DestinationPoint::class);
    }

    public function endPoint()
    {
        return $this->belongsTo(DestinationPoint::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
