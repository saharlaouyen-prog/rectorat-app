<?php

namespace App\Http\Controllers\Office;

use App\FoyerResponsable;
use App\Http\Controllers\Controller;
use App\Room;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = User::whereHas('room')->get();

        return view('office.home',compact("users"));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view("user.show",compact("user"));


    }
}
