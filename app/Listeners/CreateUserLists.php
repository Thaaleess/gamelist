<?php

namespace App\Listeners;

use App\Events\CreateUser;
use App\Models\Lists;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUserLists
{
    public function __construct()
    {
    }

    public function handle(CreateUser $event): void
    {
        $user = $event->user;

        $lists = [
            ['name' => 'Jogos completados', 'users_id' => $user->id],
            ['name' => 'Jogos em andamento', 'users_id' => $user->id],
            ['name' => 'Jogos que quero jogar', 'users_id' => $user->id],
            ['name' => 'Jogos favoritos', 'users_id' => $user->id]
        ];

        Lists::insert($lists);
    }
}
