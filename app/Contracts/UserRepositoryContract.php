<?php

namespace App\Contracts;

use App\Models\User;

interface UserRepositoryContract
{
    public function getAdmin(): User;
}
