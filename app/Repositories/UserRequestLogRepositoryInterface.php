<?php

namespace App\Repositories;

use App\Data\UserRequestLogDto;
use App\Models\UserRequestLog;
use Illuminate\Support\Collection;

interface UserRequestLogRepositoryInterface
{
    public function createUserRequestLog(UserRequestLogDto $data): UserRequestLog;
    public function getRquestLogs(): Collection;
    public function getRequestLogById(int $id): Collection;
}
