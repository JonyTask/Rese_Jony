<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function ControlFavorite(Request $request){
        $favorite_field = Favorite::where('user_id',Auth::id())->where('gourmet_id',$request->gourmet_id)->first();
        if(!$favorite_field){
            Favorite::create([
                'user_id' => Auth::id(),
                'gourmet_id' => $request->gourmet_id,
            ]);
        }else{
            Favorite::destroy($favorite_field->id);
        }
        return back();
    }
}
