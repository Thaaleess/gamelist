<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Games;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class GameController extends Controller
{
    public function __construct(){
        $this->middleware('CheckUserRole:1');
    }

    public function index(){
        $games = Games::orderBy('name', 'asc')->paginate(15);
        if ($games->isEmpty() && $games->currentPage() > 1) {
            return redirect($games->previousPageUrl());
        }

        $successMessage = session('successMessage');
        return view('admin.index')->with('games', $games)->with('successMessage', $successMessage);
    }

    public function create(){
        return view('admin.create');
    }

    public function store(GameRequest $request)
    {
        if ($request->hasFile('game_image')) {
            $image = $request->file('game_image');
            
            $resizedImage = Image::make($image)->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            
            $imagePath = $image->store('games_images', 'public');
            $resizedImage->save(public_path('storage/' . $imagePath));
        } else {
            $imagePath = "games_images/game_default.png";
        }
    
        $releaseDate = $request->release_date;

        if ($request->release_date === null){
            $releaseDate = null;
        }
    
        $game = Games::create([
            'name' => $request->name,
            'developer' => $request->developer,
            'description' => $request->description,
            'genre' => $request->genre,
            'game_image' => $imagePath,
            'release_date' => $releaseDate
        ]);
    
        return to_route('admin.index')->with('successMessage', "O jogo '{$game->name}' foi adicionado com sucesso.");
    }

    public function destroy(Games $games){
        if ($games->game_image !== null && $games->game_image !== 'games_images/game_default.png'){
            $oldImage = public_path('storage/' . $games->game_image);

            if (file_exists($oldImage)){
                unlink($oldImage);
            }
        }
        $games->delete();

        return to_route('admin.index')->with('successMessage', "O jogo '{$games->name}' removido com sucesso.");
    }

    public function edit(Games $games){
        return view ('admin.edit')->with('games', $games);
    }

    public function update(Games $games, GameRequest $request){
        if ($request->hasFile('game_image')) {
                $oldImage = public_path('storage/' . $games->game_image);
        
                if ($oldImage !== null && file_exists($oldImage) && is_file($oldImage) && $games->game_image !== 'games_images/game_default.png') {
                    unlink($oldImage);
                }
        
                $gamesPath = $request->file('game_image')->store('games_images', 'public');
                $games->game_image = $gamesPath;
            }
            $games->fill($request->except('game_image'));
            $games->save();

        return to_route('admin.index')->with('successMessage', "O jogo '{$games->name}' foi modificado com sucesso.");
    }

    public function show(Games $games){
        if ($games->release_date !== null){
            $games->release_date = Carbon::parse($games->release_date)->format('d/m/Y');
        }

        return view ('admin.show')->with('games', $games);
    }

    public function home(){
        return view('admin.home');
    }
}