<?php

namespace App\Repositories;

use App\Contracts\RoleRepositoryContract;
use App\Models\Role;

class RoleRepository implements RoleRepositoryContract
{
    public function findByName(string $name): Role
    {
        return Role::where('name', $name)->firstOrFail();
    }
}
