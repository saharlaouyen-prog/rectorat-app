<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function profile(){
        return view('user.profile', array('user' => Auth::guard("web")->user()));
    }

    public function update( Request $request)
    {

        $user=User::FindOrFail(Auth::guard("web")->user()->id) ;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'sometimes|confirmed'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->cin = $request->cin;
        $user->name_establishment = $request->name_establishment;
        $user->class = $request->class;
        $user->tel = $request->tel;
        if(!empty($request->password))$user->password = bcrypt($request->password);

        //Avatar
        if($request->hasFile('avatar')){
            $avatar=$request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('uploads/avatars/'.$filename));

            $user->avatar = $filename;


        }
        $user->save();

        return  redirect()->back()->with('success', 'IT WORKS!');
    }
}
