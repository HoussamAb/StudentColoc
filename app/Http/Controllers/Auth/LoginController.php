<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controlle
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function apiLogin(Request $request)
    {
        if($request->has("email") && $request->has("password") )
        {
        $user= User::where('email',$request->email)->get();
        if($user->count()>0)
        {
            $user=$user->first();

            if(Hash::check($request->password,$user->password))
            {
                return $user->toJson();
            }
        }
    }
        return '{"auth":"false"}';
    }

    protected function apiUpdate(Request $request)
    {
        if($request->has("id") && $request->has("telephone") && $request->has("username") && $request->has("name") ){
        $user= User::where('id',$request->id)->get();

        if($user->count()>0)
        {
            $user=$user->first();
            $user->telephone=$request->telephone;
            $user->username=$request->username;
            $user->name=$request->name;
            if($user->save())
            {
                return $user->toJson();
            }

        }
    }
        return '{"auth":"false"}';
    }

}
