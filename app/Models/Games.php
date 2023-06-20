<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'developer', 'description', 'genre', 'game_image', 'release_date'];

    public function lists(){
        return $this->belongsToMany(Lists::class, 'list_games', 'games_id', 'lists_id');
    }
}