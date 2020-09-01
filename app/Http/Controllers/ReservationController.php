<?php

namespace App\Http\Controllers;

use App\ReservationRoom;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index($id){

        $room = Room::where('is_published',1)->get();
        return view('user.reservation',compact('id'));
    }

    public function store(Request $request,$id)
    {
        $reservation= new ReservationRoom() ;
        $reservation->room_id = $id;
        $reservation->user_id = Auth::id();
        $reservation->save();

        return redirect()->route("home")->with('success', 'Data Added Successfully.');
    }
}
