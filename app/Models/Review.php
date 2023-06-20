<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['review', 'users_id', 'games_id'];

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function games(){
        return $this->belongsTo(Games::class, 'games_id');
    }
}