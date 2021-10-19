<?php

namespace App\Http\Controllers\Lecturers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/lecturers';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:lecturers')->except('logout');
    }

    public function showLoginForm(){
        
        return view('lecturers.auth.login');
    }


    public function login(Request $request)
{
    //validate the form data
    $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required|min:6'
    ]);
    //attempt to log the user in
    if (Auth::guard('lecturers')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            //if successful, then redirect to their intended location
            return redirect()->route('lecturers.home');
    }else{
        return redirect()->route('lecturers.login');
    }
    return redirect()->back()->withInput($request->only('email','remember'));
}

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('lecturers.login');
    }
    
     /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('lecturers');
    }

}