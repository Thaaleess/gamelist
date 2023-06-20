<?php
namespace App\Http\Controllers;

use App\Events\CreateUser;
use App\Http\Requests\UserRequest;
use App\Models\Lists;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('CheckUserRole:0');
    }

    public function index(){
        if (!Auth::check()){
            return back();
        } else {
            $user = Auth::user();
            $userId = $user->id;

            $lists = Lists::where('users_id', $userId)->with('games')->get();
            $reviews = Review::where('users_id', $userId)->with('games')->get();

            $totalJogosCompletos = 0;
            $totalJogosAndamento = 0;
            $totalJogosParaZerar = 0;
            $totalAnalisesFeitas = 0;

        foreach ($lists as $list) {
            $totalAnalises = $reviews->count();
            if ($list->name === 'Jogos completados') {
                $totalJogosCompletos = $list->games->count();
            } elseif ($list->name === 'Jogos em andamento') {
                $totalJogosAndamento = $list->games->count();
            } elseif ($list->name === 'Jogos que quero jogar') {
                $totalJogosParaZerar = $list->games->count();
            }   
        }

            return view('users.index', compact('user', 'lists', 'totalJogosCompletos', 'totalJogosAndamento', 'totalJogosParaZerar', 'totalAnalises'));
        }
    }

    public function create(){
        return view('users.create');
    }

    public function store(UserRequest $request){
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        event(new CreateUser($user));

        Auth::login($user);

        return to_route('users.index')->with('user', $user);
    }
}