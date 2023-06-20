<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UserSettingsController extends Controller
{
    public function index(){
        $user = Auth::user();

        return view('settings.index', compact('user'));
    }

    public function changePhoto(Request $request){
        $user = Auth::user();

        return view('settings.change_photo', compact('user'));
    }

    public function updatePhoto(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'user_image' => ['image', 'mimes:png,jpg'],
            'user_image' => 'required'
        ]);
        if($validator->fails()){
            return redirect()->route('settings.index')->withErrors($validator);
        }
        if ($user->user_image !== 'user_images/userdefault.jpg'){
            $oldImage = public_path('storage/' . $user->user_image);

            if (file_exists($oldImage)){
                unlink($oldImage);
            }
        }
        $image = $request->file('user_image');
        $imagePath = $image->store('user_images', 'public');

        $resizedImage = Image::make($image)->resize(800, null, function ($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $resizedImage->save(public_path('storage/' . $imagePath));

        $user->user_image = $imagePath;
        $user->save();

        Session::flash('mensagem.sucesso', 'Foto alterada com sucesso.');
        return back();
    }

    public function changePassword(){
        $user = Auth::user();

        return view('settings.change_password', compact('user'));
    }

    public function updatePassword(Request $request){
        $data = $request->except(['_token']);
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        if (!Hash::check($data['current_password'], $user->password)){
            Session::flash('mensagem.fracasso', 'A senha atual que você colocou não está correta.');
            return redirect()->route('settings.index');
        }
        if($validator->fails()){
            return redirect()->route('settings.index')->withErrors($validator);
        }
        
        $user->update([
            'password' => Hash::make($data['password'])
        ]);
        
        Session::flash('mensagem.sucesso', 'Senha alterada com sucesso.');
        return redirect()->route('settings.index');
    }

    public function updateName(Request $request){
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:1|max:20'
        ]);
        if($validator->fails()){
            return redirect()->route('settings.index')->withErrors($validator);
        }
        $newName = $request->input('name');
        $user->name = $newName;
        $user->save();

        Session::flash('mensagem.sucesso', 'O nome foi alterado com sucesso.');
        return redirect()->route('settings.index');
    }
}
