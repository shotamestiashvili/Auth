<?php

namespace App\Http\Middleware;

use App\Actions\CreateUserRequestLogAction;
use App\Data\UserRequestLogDto;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogUserRequests
{
    public function __construct(
        private readonly CreateUserRequestLogAction $action
    )
    {
    }

    /**
     * Handle an incoming request.
     * @param Request $request
     * @param Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {

            $dto = new UserRequestLogDto(
                userId: auth()->id(),
                tokenId: $request->query()['access_token'] ?? $request->bearerToken(),
                requestMethod: $request->method(),
                requestParams: $request->attributes->all()
            );

            $this->action->execute($dto);
        }
        return $next($request);
    }
}
