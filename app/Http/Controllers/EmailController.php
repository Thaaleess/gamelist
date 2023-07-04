<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Verified;

class EmailController extends Controller
{
    public function index(){
        return view('email.index');
    }

    public function verifyEmail($id){
        $user = User::find($id);

        if ($user->hasVerifiedEmail()){
            return redirect()->route('login')->with(['verificationMessage' => 'O seu e-mail precisa ser verificado.']);
        }

        if ($user->markEmailAsVerified()){
            event(new Verified($user));
        }

        return redirect()->route('login')->with(['verificationMessage' => 'O seu e-mail foi verificado com sucesso. Você já pode fazer seu login.']);
    }

    public function resendEmail($id){
        $user = User::find($id);

        if ($user->hasVerifiedEmail()){
            return redirect()->route('login')->with('verificationMessage', 'O seu e-mail já foi verificado.');
        }

        $user->sendEmailVerificationNotification();

        return view('email.index', compact('user'))->with('verificationMessage', 'Uma nova verificação foi enviada para o seu e-mail.');
    }
}
