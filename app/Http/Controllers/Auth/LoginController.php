<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Revolution\Line\Facades\Bot;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    
    protected function redirectTo()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username(){
        return 'username';
    }

    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user, "google");

        // Return home after login
        return redirect()->intended();
    }

    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        // print_r($user);
        $this->_registerOrLoginUser($user,"facebook");

        // Return home after login
        return redirect()->intended();
    }

    // Line login
    public function redirectToLine()
    {
        return Socialite::driver('line')->redirect();
    }
    // Line callback
    public function handleLineCallback()
    {
        $user = Socialite::driver('line')->user();
        // print_r($user);
        $this->_registerOrLoginUser($user,"line");
        // Return home after login
        return $_SERVER['HTTP_REFERER'];
    }

    protected function _registerOrLoginUser($data, $type)
    {
        //GET USER 
        $user = User::where('name', '=', $data->name)->first();
        // print_r($data) ;
        // exit();

        if (!$user) {
            //CREATE NEW USER
            $user = new User();
            $user->name = $data->name;
            $user->provider_id = $data->id;
            $user->type = $type;

            if (!empty($data->email)) {
                $user->username = $data->email;
                $user->email = $data->email;
            }
            if (!empty($data->avatar)) {
                $user->avatar = $data->avatar;
            }

            if (empty($data->email)) {
                $user->username = $data->name;
                $user->email = "เพิ่มอีเมล";
            }
            if (empty($data->avatar)) {
                $user->avatar = "เพิ่มรูปโปรไฟล์";
            }

            $user->save();
        }
        //LOGIN
        Auth::login($user);
    }
}
