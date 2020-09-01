<?php

namespace App\Http\Controllers\Office\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (Auth::guard("office")->check()) return redirect()-> route("office.dashboard.home");

        return view('office.auth.login');
    }

    /**
     * Login the admin.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validator($request);

        if(Auth::guard('office')->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...
            return redirect()
                ->intended(route('office.dashboard.home'))
                ->with('status','You are Logged in as Admin!');
        }

        //Authentication failed...
        return $this->loginFailed();
    }

    /**
     * Logout the admin.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        Auth::guard('office')->logout();
        return redirect()
            ->route('office.login')
            ->with('status','Admin has been logged out!');
    }

    /**
     * Validate the form data.
     *
     * @param Request $request
     * @return
     */
    private function validator(Request $request)
    {
        $rules = [
            'email'    => 'required|email|exists:office_responsables|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    /**
     * Redirect back after a failed login.
     *
     * @return RedirectResponse
     */
    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }
}
