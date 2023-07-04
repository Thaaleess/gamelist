<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Lists;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request){
        $searchItem = $request->input('search');

        $results = Games::where('name', 'like', '%'.$searchItem.'%')->paginate(12);
        if ($results->isEmpty() && $results->currentPage() > 1) {
            return redirect($results->previousPageUrl());
        }

        return view('search.index', compact('results'));
    }

    public function show(Games $games){
        $user = Auth::user();
        $gameId = $games->id;

        $reviews = Review::where('games_id', $games->id)->get();
        $userReviews = Review::where('users_id', $user->id)->where('games_id', $games->id)->get();
        $lists = Lists::where('users_id', $user->id)->get();

        $savedLists = $lists->filter(function ($lista) use ($gameId) {
            return !$lista->games->contains('id', $gameId);
        });
        $games->release_date = Carbon::parse($games->release_date)->format('d/m/Y');

        return view('search.show', compact('games', 'savedLists', 'userReviews', 'user', 'reviews'));
    }
}