<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gourmet;

class AdminController extends Controller
{
    public function ViewAdmin(){
        $gourmets = Gourmet::with(['areas','genres'])->get();
        return view('admin',compact('gourmets'));
    }

    public function DeleteGourmet(Request $request){
        Gourmet::find($request->gourmet_id)->delete();
        return redirect('/admin');
    }
}
