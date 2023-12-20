<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gourmet extends Model
{
    protected $fillable = ['genre_id','area_id'];

    public function areas(){
        return $this->belongsTo(Area::class,'area_id');
    }

    public function genres(){
        return $this->belongsTo(Genre::class,'genre_id');
    }
}
