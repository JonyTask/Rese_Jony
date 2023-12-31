<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Gourmet;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\MyFuncs\MyFuncs;

class GourmetController extends Controller
{
    public function ViewGourmets(){
        $gourmets = Gourmet::with(['areas','genres'])->get();
        $areas = Area::all();
        $genres = Genre::all();

        $favorites = Favorite::where('user_id',Auth::id())->get('gourmet_id');
        $favorites_array = MyFuncs::CreateArray($favorites);
        return view('gourmets',compact('gourmets','areas','genres','favorites_array'));
    }

    public function ViewDetail(Request $request){
        $gourmet = Gourmet::with(['areas','genres'])->find($request->gourmet_id);
        return view('detail',compact('gourmet'));
    }
}
