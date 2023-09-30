<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function findUserById(?int $id): User|null
    {
        return User::findOrFail(id: $id);
    }
}
