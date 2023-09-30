<?php

namespace App\Data;

class UserRequestLogDto
{
    public function __construct(
        public readonly int    $userId,
        public readonly string $tokenId,
        public readonly string $requestMethod,
        public readonly array  $requestParams,
    )
    {
    }
}
