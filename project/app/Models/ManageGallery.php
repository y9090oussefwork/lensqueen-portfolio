<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageGallery extends Model
{
    use HasFactory;

    protected $fillable = ['tag_id','image'];

    public function tag(){
        return $this->belongsTo(ManageTag::class);
    }
}
