<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryContract;
use App\Models\User;

class UserRepository implements UserRepositoryContract
{
    public function getAdmin(): User
    {
        return User::where('email', env('MAIL_FROM_ADDRESS', 'admin@example.com'))
            ->firstOrFail();
    }
}
