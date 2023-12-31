<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Gourmet;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Favorite;
use App\MyFuncs\MyFuncs;

class SearchController extends Controller
{
    public function SearchScope(Request $request){
        $gourmets = Gourmet::AreaSearch($request->gourmet_area)->GenreSearch($request->gourmet_genre)->KeywordSearch($request->gourmet_name)->get();
        $areas = Area::all();
        $genres = Genre::all();

        $favorites = Favorite::where('user_id',Auth::id())->get('gourmet_id');
        $favorites_array = MyFuncs::CreateArray($favorites);
        return view('gourmets',compact('gourmets','areas','genres','favorites_array'));
    }
}