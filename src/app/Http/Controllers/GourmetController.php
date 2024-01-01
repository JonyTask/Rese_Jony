<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Gourmet;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\Models\Reserve;
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

    public function ViewMyPage(){
        $reserves = Reserve::where('user_id',Auth::id())->with('gourmets:id,name')->get();

        $gourmets = Gourmet::where(function($query){
            $favorites = Favorite::where('user_id',Auth::id())->get('gourmet_id');
            $favorites_array = MyFuncs::CreateArray($favorites);
            return $query->whereIn('gourmets.id',$favorites_array);
        })->with(['areas','genres'])->get();

        return view('mypage',compact('reserves','gourmets'));
    }
}
