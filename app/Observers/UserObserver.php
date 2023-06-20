<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function creating(User $user){
        if (!$user->user_image){
            $user->user_image = 'user_images/userdefault.jpg';
        }
    }
}