<?php

namespace App\Models;

use App\Http\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDetails extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['plan_id','language_id','name','details'];

    protected $casts = [
        'details' => 'object'
    ];

    public function plan(){
        return $this->belongsTo(Plan::class, 'plan_id');
    }

}
