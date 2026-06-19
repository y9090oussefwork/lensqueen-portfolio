<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManageTag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function ManageGallery(){
        return $this->hasMany(ManageGallery::class);
    }

}
