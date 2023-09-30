<?php

namespace App\Http\Controllers;

use App\Actions\CreateTokenAction;
use App\Actions\DeleteTokenAction;
use App\Models\UserToken;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;

class TokenController extends Controller
{
    /**
     * Create a new user token.
     * @param CreateTokenAction $action An instance of CreateTokenAction for token creation.
     * @return JsonResponse A JSON response containing the result of the token creation.
     * @throws AuthorizationException
     */
    public function create(CreateTokenAction $action): JsonResponse
    {
        $this->authorize('create', UserToken::class);

        $result = $action->execute(auth()->id());

        return new JsonResponse($result);
    }


    /**
     * Delete a user token by its identifier.
     * @param DeleteTokenAction $action An instance of DeleteTokenAction for token deletion.
     * @param string $token The token identifier to be deleted.
     * @return bool True if the token was successfully deleted; otherwise, false.
     * @throws AuthorizationException
     */
    public function delete(DeleteTokenAction $action, string $token): bool
    {
        $this->authorize('delete', [UserToken::class, $token]);

        return $action->execute(id: auth()->id(), token: $token);
    }
}
