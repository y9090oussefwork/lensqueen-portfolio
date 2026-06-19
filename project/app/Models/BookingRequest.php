<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'date', 'status', 'booking_form', 'note'];

    protected $casts = [
        'booking_info' => 'object',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
