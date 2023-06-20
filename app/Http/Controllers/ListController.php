<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Lists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ListController extends Controller
{
    public function index(Request $request, $listName){
        $user = Auth::user();
        $list = Lists::where('name', $listName)->where('users_id', $user->id)->first();
        $listId = $list->id;

        $games = Games::whereHas('lists', function ($query) use ($listId) {
            $query->where('lists_id', $listId);
        })->paginate(12);
        if ($games->isEmpty() && $games->currentPage() > 1) {
            return redirect($games->previousPageUrl());
        }

        return view('lists.index', compact('games', 'listName', 'listId'));
    }

    public function store(Request $request){
        $gameId = $request->input('games_id');
        $listId = $request->input('lists_id');

        $list = Lists::find($listId);
        $list->games()->attach($gameId);

        Session::flash('mensagem.sucesso', 'O jogo foi adicionado a lista com sucesso!');
        return back();
    }

    public function removeGame(Lists $list, Games $game){
        $list->games()->detach($game->id);
        
        Session::flash('mensagem.sucesso', 'O jogo foi removido com sucesso.');
        return back();
    }
}