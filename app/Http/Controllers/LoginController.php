<?php

namespace App\Http\Controllers;

use App\Events\CreateUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index(){
        if (Auth::check()){
            $user = Auth::user();
            Auth::login($user);

            if ($user->role == '1'){
                return to_route('admin.home')->with('user', $user);
            } else {
                return to_route('users.index')->with('user', $user);
            }
        } else {
            return view('login.index');
        }
    }

    public function store(Request $request)
    {
        $attempt = $request->only(['email', 'password']);
    
        if (Auth::attempt($attempt)) {
            $user = Auth::user();
    
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                $user->sendEmailVerificationNotification();

                return redirect()->route('login')->with(['verificationMessage' => 'Este e-mail precisa ser verificado.']);
            }
    
            if ($user->role == '1') {
                return redirect()->route('admin.home')->with('user', $user);
            } else {
                return redirect()->route('users.index')->with('user', $user);
            }
        }
        return redirect()->back()->withErrors('Usuário ou senha inválido.')->withInput($request->only('email'));
    }

    public function destroy(){
        Auth::logout();

        return to_route('login');
    }

    public function recoveryPassword(){
        return view('login.recovery_password');
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $sendEmail = Password::sendResetLink($request->only('email'));

        if ($sendEmail === Password::RESET_LINK_SENT){
            return back()->with('verificationMessage', 'Um link de redefinição de senha foi enviado para o seu e-mail');
        }

        return back()->withErrors([
            'email' => trans($sendEmail),
        ]);
    }

    public function formNewPassword(Request $request, $token){
        $user = User::where('email', $request->email)->first();

        $userId = $user->id;

        return view('login.formpassword', ['token' => $token, 'email' => $request->email, 'user_id' => $userId]);
    }

    protected function newPassword(Request $request){
        $request->validate([
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);

        $user = User::find($request->user_id);

        $user->update([
            'password' => Hash::make($request->password)
        ]);
        
        return redirect()->route('login')->with('verificationMessage', 'A senha foi alterada com sucesso.');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;

            $avatar = str_replace('s96-c', 's250-c', $user->avatar);

            $newUser->user_image = $avatar;
            $newUser->role = 0;
            $newUser->email_verified_at = Carbon::now();

            $password = Str::random(16);
            $newUser->password = Hash::make($password);

            $newUser->save();

            event(new CreateUser($newUser));
            Auth::login($newUser);
        }

        return to_route('users.index')->with('user', $user);
    }
}