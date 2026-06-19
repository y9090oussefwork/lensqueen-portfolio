<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','product_id'];

    public function details(){
        return $this->belongsTo(ProductDetails::class, 'product_id', 'product_id');
    }
}
