<?php

namespace App\Http\Controllers;

use App\Events\CreateUser;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index(){
        if (Auth::user() == true){
            if (Auth::check()){
                $user = Auth::user();

                if ($user->role == '1'){
                    Auth::login($user);

                    return to_route('admin.home')->with('user', $user);
                } else {
                    Auth::login($user);

                    return to_route('users.index')->with('user', $user);
                }
            }
        } else {
            return view ('login.index');
        }
    }

    public function store(Request $request){
        if (!Auth::attempt($request->only(['email', 'password']))){
            return redirect()->back()->withErrors('Usuário ou senha inválido.');
        } else {
            if (Auth::check()){
                $user = Auth::user();
                Auth::login($user);

                if ($user->role == '1'){
                    return to_route('admin.home')->with('user', $user);
                } else {
                    return to_route('users.index')->with('user', $user);
                }
            }
        }
    }

    public function destroy(){
        Auth::logout();

        return to_route('login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        dd($user);

        Auth::login($user);

        return to_route('users.index')->with('user', $user);
    }
}