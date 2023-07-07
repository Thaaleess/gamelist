<?php

namespace App\Http\Controllers;

use App\Models\Games;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function __construct(){
        $this->middleware('CheckUserRole:0');
    }

    public function index(){
        $user = Auth::user();
        $reviews = Review::where('users_id', $user->id)->with('games')->paginate(5);

        if ($reviews->isEmpty() && $reviews->currentPage() > 1) {
            return redirect($reviews->previousPageUrl());
        }

        return view('reviews.index', compact('reviews'));
    }
 
    public function store(Request $request){
        $user = Auth::user();

        Review::create([
            'review' => $request->input('review'),
            'users_id' => $user->id,
            'games_id' => $request->input('game_id')
        ]);

        Session::flash('mensagem.sucesso', 'Sua análise sobre esse jogo foi feita com sucesso.');
        return back();
    }

    public function destroy(Review $review){
        $review->delete();

        Session::flash('mensagem.sucesso', 'Sua análise deste jogo foi excluída com sucesso.');
        return back();
    }

    public function update(Review $review, Request $request){
        $review->review = $request->input('review');
        $review->save();

        Session::flash('mensagem.sucesso', 'Sua análise foi alterada com sucesso.');
        return back();
    }

    public function showReviews(Games $games){
        $gameId = $games->id;

        $reviews = Review::where('games_id', $games->id)->paginate(10);

        return view('reviews.show_reviews', compact('reviews', 'games'));
    }
}
