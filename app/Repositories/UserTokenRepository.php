<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserToken;

class UserTokenRepository implements UserTokenRepositoryInterface
{
    public function getUserIdByToken(string $token): int|null
    {
        return UserToken::where('access_token', $token)->value('user_id');
    }

    public function createToken(int $id, string $token): UserToken
    {
        return User::findOrFail($id)->userToken()->create([
            'access_token' => $token,
            'user_id' => $id
        ]);
    }

    public function getTokensById(int $id): array
    {
        return UserToken::where('user_id', $id)->pluck('access_token')->toArray();
    }

    public function deleteTokenByIdAndToken(int $id, string $token): bool
    {
        return UserToken::where('user_id', $id)->where('access_token', $token)->delete();
    }

    public function deleteExpiredTokens(): bool
    {
        return UserToken::where('expires_at', '<', now())->delete();
    }
}
