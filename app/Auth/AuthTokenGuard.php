<?php

namespace App\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Http\Request;

class AuthTokenGuard implements Guard
{
    use GuardHelpers;

    public function __construct(
        protected         $provider,
        protected Request $request,
        protected string  $storageKey = 'access_token',
        protected bool    $hash = false
    )
    {
    }

    /**
     * Get the currently authenticated user.
     *
     * @return Authenticatable|null
     */
    public function user(): Authenticatable|null
    {
        if (!is_null($this->user)) {
            return $this->user;
        }

        $user = null;

        $token = $this->getTokenForRequest();

        if (!empty($token)) {
            $user = $this->provider->retrieveByCredentials([
                $this->storageKey => $this->hash ? hash('sha256', $token) : $token,
            ]);
        }

        $this->user = $user;

        return $this->user;
    }

    /**
     * Get the token for the current request.
     *
     * @return string|null
     */
    public function getTokenForRequest(): string|null
    {
        $token = $this->getTokenFromRequestParameter();
        if ($token) {
            return $token;
        }

        return $this->request->bearerToken();
    }

    protected function getTokenFromRequestParameter(): string|null
    {
        return $this->request->query('access_token');
    }


    /**
     * Validate a user's credentials.
     *
     * @param array $credentials
     * @return bool
     */
    public function validate(array $credentials = [])
    {
    }
}
