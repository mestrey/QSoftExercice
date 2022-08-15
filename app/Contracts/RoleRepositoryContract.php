<?php

namespace App\Contracts;

use App\Models\Role;

interface RoleRepositoryContract
{
    public function findByName(string $name): Role;
}
