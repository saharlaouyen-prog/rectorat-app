<?php

namespace App\Http\Controllers\foyer;

use App\FoyerResponsable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;

class ProfileController extends Controller
{

    public function profile(){
        return view('foyer.profile', array('user' => Auth::guard('foyer')->user()));
    }

    public function update( Request $request)
    {

        $user=FoyerResponsable::FindOrFail(Auth::guard('foyer')->user()->id) ;
        $request->validate([
            'name' => 'required',
            'name_res' => 'required',
            'address' => 'required',
            'gouver' => 'required',
            'tel' => 'required',
            'fax' => 'required',
            'capacity' => 'required',
            'email' => 'required|email',
            'password' => 'sometimes|confirmed'
        ]);

        $user->name = $request->name;
        $user->name_res = $request->name_res;
        $user->address = $request->address;
        $user->gouver = $request->gouver;
        $user->tel = $request->tel;
        $user->fax = $request->fax;
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
