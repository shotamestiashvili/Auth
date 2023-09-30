<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function findUserById(int $id): User|null;
}
