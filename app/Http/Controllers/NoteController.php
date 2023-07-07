<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NoteController extends Controller
{
    public function __construct(){
        $this->middleware('CheckUserRole:0');
    }

    public function index(Games $games){
        $user = Auth::user();

        $notes = Notes::where('users_id', $user->id)->where('games_id', $games->id)->paginate(8);
        if ($notes->isEmpty() && $notes->currentPage() > 1) {
            return redirect($notes->previousPageUrl());
        }

        return view('notes.index', compact('notes', 'games'));
    }

    public function store(Request $request){
        $user = Auth::user();

        Notes::create([
            'note' => $request->input('note'),
            'users_id' => $user->id,
            'games_id' => $request->input('game_id')
        ]);

        Session::flash('mensagem.sucesso', 'A anotação foi feita com sucesso.');
        return back();
    }

    public function destroy(Notes $notes){
        $notes->delete();

        Session::flash('mensagem.sucesso', 'A anotação foi excluída com sucesso.');
        return back();
    }

    public function update(Notes $notes, Request $request){
        $notes->note = $request->input('note');
        $notes->save();

        Session::flash('mensagem.sucesso', 'A anotação foi alterada com sucesso.');
        return back();
    }
}
