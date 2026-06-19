<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Translatable;

class ProductDetails extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['product_id', 'language_id', 'title', 'short_details', 'tag', 'category', 'description'];

    protected $casts = [
        'description' => 'object'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
