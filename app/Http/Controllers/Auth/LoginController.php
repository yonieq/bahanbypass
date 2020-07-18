<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Auth;
use Str;
use App\User;

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

    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        $user = Socialite::driver('github')->user();

        $user = User::firstOrCreate([
            'name' => $user->name
        ], [
            'email' => $user->email,
            'password' => Hash::make('dummy')
        ]);

        Auth::login($user, true);

        return redirect('/home');
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        $user = Socialite::driver('facebook')->user();

        $user = User::firstOrCreate([
            'name' => $user->name
        ], [
            'email' => $user->email,
            'password' => Hash::make('dummy')
        ]);

        Auth::login($user, true);

        return redirect('/home');
    }

    public function twitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterRedirect()
    {
        $user = Socialite::driver('twitter')->user();

        $user = User::firstOrCreate([
            'name' => $user->name
        ], [
            'email' => $user->email,
            'password' => Hash::make('dummy')
        ]);

        Auth::login($user, true);

        return redirect('/home');
    }

    public function showLoginForm(){
        return view('auth.login');
    }
    
}
