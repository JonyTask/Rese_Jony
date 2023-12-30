<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReserveRequest;
use App\Models\Reserve;

class ReserveController extends Controller
{
    public function ReservationDone(ReserveRequest $request){
        //dd($request);
        Reserve::create([
            'user_id' => Auth::id(),
            'gourmet_id' => $request->gourmet_id,
            'reserve_date' => $request->reserve_date,
            'reserve_time' => $request->reserve_time,
            'number' => $request->reserve_number
        ]);
        return view('thanks');
    }
}
