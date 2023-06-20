<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function games(){
        return $this->belongsToMany(Games::class, 'list_games', 'lists_id', 'games_id');
    }
}