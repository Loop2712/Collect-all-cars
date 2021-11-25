<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Revolution\Line\Facades\Bot;
use Illuminate\Http\Request;
use Redirect;
use App\Http\Controllers\API\LineApiController;
use Illuminate\Support\Facades\DB;

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
        // if(!isset($_SESSION["backurl"]) )
        //     $_SESSION["backurl"] = $_SERVER['HTTP_REFERER'] ;
        //     $backurl = $_SESSION["backurl"];
        //     // echo "backurl >> ". parse_url($backurl, PHP_URL_QUERY);
        //     // exit();

        $backurl = $_SERVER['HTTP_REFERER'] ;

        $redirectTo = parse_url($backurl, PHP_URL_QUERY);

        if (!empty($redirectTo)) {
            $backurl_split = explode('redirectTo=', $redirectTo, 2);
            $back = $backurl_split[1];
            return $back;
        }else{
            return $backurl;
        }

    }

    // protected function redirectTo()
    // {
    //     return $_SERVER['HTTP_REFERER'];
    // }


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
    public function redirectToGoogle(Request $request)
    {
        $request->session()->put('redirectTo', $request->get('redirectTo'));

        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user, "google",null,null);

        $value = $request->session()->get('redirectTo');
        $request->session()->forget('redirectTo');

        // Return home after login
        return redirect()->intended($value);
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
        $this->_registerOrLoginUser($user,"facebook",null,null);

        // Return home after login
        return redirect()->intended();
    }

    // Line login
    public function redirectToLine(Request $request)
    {
        $request->session()->put('Student', $request->get('Student'));
        $request->session()->put('redirectTo', $request->get('redirectTo'));
        $request->session()->put('from', $request->get('from'));

        return Socialite::driver('line')->redirect();
    }

    // Line login TU
    public function redirectToLine_TU_SOS(Request $request)
    {
        $request->session()->put('Student', $request->get('Student'));
        $request->session()->put('redirectTo', 'https://www.viicheck.com/sos_map/create');

        return Socialite::driver('line')->redirect();
    }

    // Line callback
    public function handleLineCallback(Request $request)
    {
        $user = Socialite::driver('line')->user();
        // echo "<pre>";
        // print_r($user);
        // echo "<pre>";
        // exit();
        $student = $request->session()->get('Student');
        $from = $request->session()->get('from');

        $this->_registerOrLoginUser($user,"line",$student , $from);

        $value = $request->session()->get('redirectTo');
        $request->session()->forget('redirectTo');

        return redirect()->intended($value);

    }

    protected function _registerOrLoginUser($data, $type , $student , $from)
    {
        //GET USER 
        $user = User::where('provider_id', '=', $data->id)->first();
        // print_r($data) ;

        if (!$user) {
            //CREATE NEW USER
            $user = new User();
            $user->name = $data->name;
            $user->provider_id = $data->id;
            $user->type = $type;
            $user->username = $data->name;
            $user->status = "active";

            if (!empty($data->email)) {
                $user->email = $data->email;
            }
            if (!empty($data->avatar)) {
                $user->avatar = $data->avatar;
            }

            if (empty($data->email)) {
                $user->email = "กรุณาเพิ่มอีเมล";
            }
            if (empty($data->avatar)) {
                $user->avatar = "กรุณาเพิ่มรูปโปรไฟล์";
            }
            $user->save();
        }

        //LOGIN
        Auth::login($user);
        $data_user = Auth::user();

        if ($type == "line") {

            $provider_id = $user->provider_id ;

            $data_users = DB::table('users')
                ->where('provider_id', $provider_id)
                ->get();

            $lineAPI = new LineApiController();
            $lineAPI->check_language_user($data_users);

        }

        if (!empty($student)) {
            $student_split = explode("_",$student);
            $student_name = $student_split[0];
            $student_id = $student_split[1];

            if ($student_name == "tu") {
                DB::table('d_p_tu_students')
                    ->where('student_id', $student_id)
                    ->update([
                        'status_line' => 'Yes',
                        'user_id' => $data_user->id,
                    ]);

                DB::table('users')
                    ->where('id', $data_user->id)
                    ->update([
                        'role' => 'Student-TU',
                    ]);
            }
        }

        if (!empty($from)) {

            if ($from == "line_oa") {

                DB::table('users')
                    ->where([ 
                            ['type', 'line'],
                            ['provider_id', $user->provider_id],
                        ])
                    ->update([
                        'add_line' => 'Yes'
                        'status' => 'active'
                    ]);
            }
        }

    }
}
