<?php

namespace App\Http\Controllers;

use App\FoyerResponsable;
use App\ReservationRoom;
use App\Room;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $rooms = Room::where('is_published',1)->get();
        $foyer = FoyerResponsable::where('is_active',1)->get();
        $reservation =(Auth::check())? Auth::user()->room_id:null;
        //$reserved=ReservationRoom::where('is_accepted',1)->get();
        return view('user.home',compact("rooms","foyer", "reservation"));
    }

    public function show($id)
    {
        $room = Room::where('is_published',1)->where('foyer_id',$id)->get();
        $foyer = FoyerResponsable::where('is_active',1)->get();

        return view("user.room",compact("room", "foyer"));


    }

    /*public function fill($id)
    {
        $room = Room::where('is_published',1)->findOrFail($id);
        $foyer = FoyerResponsable::where('is_active',1)->findOrFail($id);

        return view("user.room",compact("room", "foyer"));


    }*/
}
