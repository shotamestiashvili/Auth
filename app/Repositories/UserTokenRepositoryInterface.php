<?php

namespace App\Repositories;

use App\Models\UserToken;
interface UserTokenRepositoryInterface
{
    public function getUserIdByToken(string $token): int|null;
    public function createToken(int $id, string $token): UserToken;
    public function getTokensById(int $id): array;
    public function deleteTokenByIdAndToken(int $id, string $token): bool;
    public function deleteExpiredTokens(): bool;
}
