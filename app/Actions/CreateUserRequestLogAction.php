<?php

namespace App\Actions;

use App\Data\UserRequestLogDto;
use App\Repositories\UserRequestLogRepositoryInterface;

class CreateUserRequestLogAction
{
    public function __construct(
        private readonly UserRequestLogRepositoryInterface $userRequestLogRepository,
    )
    {
    }

    public function execute(UserRequestLogDto $data): void
    {
        $this->userRequestLogRepository->createUserRequestLog(data: $data);
    }
}
