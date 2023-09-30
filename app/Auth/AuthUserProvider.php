<?php

namespace App\Auth;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserTokenRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class AuthUserProvider implements UserProvider
{
    public function __construct(
        private readonly UserTokenRepositoryInterface $userTokenRepository,
        private readonly UserRepositoryInterface      $userRepository,
    )
    {
    }

    /**
     * @param array $credentials
     * @return Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials): Authenticatable|null
    {
        $userId = $this->userTokenRepository->getUserIdByToken($credentials['access_token']);

        return $this->userRepository->findUserById($userId);
    }

    /**
     * @param $identifier
     * @return Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        // TODO: Implement retrieveById() method.
    }

    /**
     * @param $identifier
     * @param $token
     * @return Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        // TODO: Implement retrieveByToken() method.
    }

    /**
     * @param Authenticatable $user
     * @param $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        // TODO: Implement updateRememberToken() method.
    }


    /**
     * @param Authenticatable $user
     * @param array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
    }
}
