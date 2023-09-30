<?php

namespace App\Policies;

use App\Models\User;
use App\Repositories\UserTokenRepositoryInterface;
use Illuminate\Auth\Access\Response;


class TokenPolicy
{
    public function __construct(
        private readonly UserTokenRepositoryInterface $userTokenRepository
    ){}

    public function create(User $user): bool
    {
        return $user->is_verified;
    }

    public function delete(User $user, $token): mixed
    {
        $userTokens = $this->userTokenRepository->getTokensById($user->id);

        if(!in_array($token, $userTokens)) {
            return Response::deny('Token does not belongs to you.');
        }
        return true;
    }
}
