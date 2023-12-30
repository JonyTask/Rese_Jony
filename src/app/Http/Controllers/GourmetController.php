<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gourmet;
use App\Models\Area;
use App\Models\Genre;

class GourmetController extends Controller
{
    public function ViewGourmets(){
        $gourmets = Gourmet::with(['areas','genres'])->get();
        $areas = Area::all();
        $genres = Genre::all();
        return view('gourmets',compact('gourmets','areas','genres'));
    }

    public function ViewDetail(Request $request){
        $gourmet = Gourmet::with(['areas','genres'])->find($request->gourmet_id);
        return view('detail',compact('gourmet'));
    }

}
