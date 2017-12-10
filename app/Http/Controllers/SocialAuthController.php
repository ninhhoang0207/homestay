<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use DB;
use Hash;
use Auth;
use Session;
use Redirect;

class SocialAuthController extends Controller
{
    use AuthenticatesUsers;
    //
    public function fbRedirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function fbHandleProviderCallback(Request $request)
    {
        $user = Socialite::driver('facebook')->user();
        Session::put('social_user',$user);
        $user_in_db = DB::table('users')->where('email',$user->email)
                        ->first();
        if (isset($user_in_db)) {
            if ($user_in_db->role != '' && $user_in_db->phone != 0){
                $this->login($user_in_db->email,$user_in_db->email);
                return Redirect::route('home');
            }
        }
        return view('auth.social_confirm');
    }

     public function ggRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function ggHandleProviderCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();
        Session::put('social_user',$user);
        $user_in_db = DB::table('users')->where('email',$user->email)
                        ->first();
        if (isset($user_in_db)) {
            if ($user_in_db->role != '' && $user_in_db->phone != 0){
                $this->login($user_in_db->email,$user_in_db->email);
                return Redirect::route('home');
            }
        }
        return view('auth.social_confirm');
    }

    public function login($email, $password){
       $this->guard()->attempt(array(
            'email'     => $email,
            'password'  =>  $password
        ),false);
    }

    public function confirm(Request $request){
        $user = Session::pull('social_user');
        $user_in_db = DB::table('users')->where('email',$user->email)
                        ->first();
        if(!isset($user_in_db)){
            $data = array(
                'name'      =>  $user->name,
                'email'     =>  $user->email,
                'password'  =>  Hash::make($user->email),
                'phone'     =>  $request->phone,
                );
            $insert = DB::table('users')->insert($data);
        }else{
            $data = array(
                'role'      =>  $request->role,
                'phone'     =>  $request->phone,
                );
            $update = DB::table('users')->where('email',$user->email)->update($data);
        }
        $this->login($user->email,$user->email);
        return Redirect::route('home');
    }
}
