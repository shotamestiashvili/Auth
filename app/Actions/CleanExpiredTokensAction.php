<?php

namespace App\Actions;

use App\Repositories\UserTokenRepositoryInterface;

class CleanExpiredTokensAction
{
    public function __construct(
        private readonly UserTokenRepositoryInterface $userTokenRepository,
    )
    {
    }

    public function execute(): bool
    {
        return $this->userTokenRepository->deleteExpiredTokens();
    }
}
