<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;
use App\Models\Reserve;

class ReserveController extends Controller
{
    public function ReservationDone(ReserveRequest $request){
        Reserve::create([
            'user_id' => Auth::id(),
            'gourmet_id' => $request->gourmet_id,
            'reserve_date' => $request->reserve_date,
            'reserve_time' => $request->reserve_time,
            'number' => $request->reserve_number
        ]);
        return view('thanks');
    }

    public function ReservationDeleteConfirm(Request $request){
        $reserve = Reserve::find($request->reserve);
        return view('del_confirm',compact('reserve'));
    }

    public function ReservationDelete(Request $request){
        $reserve = Reserve::find($request->id);
        $reserve->delete();
        return redirect('/Mypage')->with('message','予約を削除しました');
    }
}
