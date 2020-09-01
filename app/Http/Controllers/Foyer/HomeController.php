<?php

namespace App\Http\Controllers\Foyer;

use App\FoyerResponsable;
use App\Http\Controllers\Controller;
use App\Room;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function index(){
        $foyer = FoyerResponsable::all();
        return view('welcome');
    }
}
