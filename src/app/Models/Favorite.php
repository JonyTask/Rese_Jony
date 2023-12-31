<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','gourmet_id'];

    public function gourmets(){
        return $this->belongsTo(Gourmet::class,'gourmet_id');
    }
}
