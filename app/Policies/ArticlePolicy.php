<?php

namespace App\Policies;

use App\Contracts\RoleRepositoryContract;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(
        protected RoleRepositoryContract $roleRepository
    ) {
    }

    public function update(User $user)
    {
        return $user->role->id == $this->roleRepository->findByName('admin')->id;
    }

    public function create(User $user)
    {
        return $user->role->id == $this->roleRepository->findByName('admin')->id;
    }

    public function delete(User $user)
    {
        return $user->role->id == $this->roleRepository->findByName('admin')->id;
    }
}
