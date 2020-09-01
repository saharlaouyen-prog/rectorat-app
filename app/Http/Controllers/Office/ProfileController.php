<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\OfficeResponsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    public function profile(){
        return view('office.profile', array('user' => Auth::guard('office')->user()));
    }

    public function update( Request $request)
    {

        $user=OfficeResponsable::FindOrFail(Auth::guard('office')->user()->id) ;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'sometimes|confirmed'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
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
