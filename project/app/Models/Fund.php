<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fund extends Model
{
    protected $guarded = ['id'];
    protected $table = "funds";

    protected $casts = [
        'detail' => 'object',
        'booking_info' => 'object',
    ];


    public function ScopePaymentFor()
    {
        $res['title'] = 'Payment';
        $res['route'] = '#';
        $res['type'] = 'Payment';
        if ($this->plan_id) {
            $res['title'] = optional($this->planDetails)->name ?? 'Plan';
            $res['route'] = route('admin.planEdit',$this->plan_id);
            $res['type'] = 'Plan';
        } elseif ($this->product_id) {
            $res['title'] = optional($this->productDetails)->title ?? 'Product';
            $res['route'] = route('admin.productEdit',$this->product_id);
            $res['type'] = 'Product';
        };
        return $res;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gateway()
    {
        return $this->belongsTo(Gateway::class, 'gateway_id');
    }


    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function planDetails()
    {
        return $this->belongsTo(PlanDetails::class, 'plan_id', 'plan_id');
    }


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productDetails()
    {
        return $this->belongsTo(ProductDetails::class, 'product_id', 'product_id');
    }

}
