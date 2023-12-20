<?php

namespace App\Http\Controllers;

use App\Models\Gourmet;

class GourmetController extends Controller
{
    public function ViewGourmets(){
        $gourmets = Gourmet::with(['areas','genres'])->get();
        return view('gourmets',compact('gourmets'));
    }
}
