<?php

namespace App\Actions;

use App\Models\UserToken;
use App\Repositories\UserTokenRepositoryInterface;

class CreateTokenAction
{
    public function __construct(
        private readonly UserTokenRepositoryInterface $userTokenRepository,
    )
    {
    }

    public function execute(int $id): UserToken
    {
        return $this->userTokenRepository->createToken(
            id: $id,
            token: $this->generate(id: $id)
        );
    }

    private function generate(int $id): string
    {
        return hash('sha256', time() . $id);
    }
}
