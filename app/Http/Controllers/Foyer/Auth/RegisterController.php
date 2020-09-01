<?php

namespace App\Http\Controllers\Foyer\Auth;

use App\FoyerResponsable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


    public function showRegisterForm()
    {
        if (Auth::guard("foyer")->check()) return  redirect()-> route("foyer.dashboard.home");
        return view('foyer.auth.register');
    }


    public function register(Request $request)
    {
        $this->validator($request->all());

        if($this->create($request->all())){
            return redirect()
                ->intended(route('foyer.login'))
                ->with('status','You are registered .wait for admin validation!');
        }

        //Authentication failed...
        return $this->RegisterFailed();
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'name_res' => 'required|string|max:255',
            'address' => 'required|text',
            'gouver' => 'required|string|max:255',
            'tel' => 'required|string',
            'fax' => 'required|string',
            'capacity' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:foyer_responsables',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    protected function create(array $data)
    {
        return FoyerResponsable::create([
            'name' => $data['name'],
            'name_res' => $data['name_res'],
            'address' => $data['address'],
            'gouver' => $data['gouver'],
            'tel' => $data['tel'],
            'fax' => $data['fax'],
            'capacity' => $data['capacity'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    private function RegisterFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Register failed, please try again!');
    }
}
