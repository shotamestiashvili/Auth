<?php

namespace App\Actions;

use App\Repositories\UserTokenRepositoryInterface;

class DeleteTokenAction
{
    public function __construct(
        private readonly UserTokenRepositoryInterface $userTokenRepository,
    )
    {
    }

    public function execute(int $id, string $token): bool
    {
        return $this->userTokenRepository->deleteTokenByIdAndToken(id: $id, token: $token);
    }
}
