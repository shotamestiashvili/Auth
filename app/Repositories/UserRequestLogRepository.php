<?php

namespace App\Repositories;

use App\Data\UserRequestLogDto;
use App\Models\UserRequestLog;
use Illuminate\Support\Collection;

class UserRequestLogRepository implements UserRequestLogRepositoryInterface
{
    /**
     * @param UserRequestLogDto $data
     * @return UserRequestLog
     */
    public function createUserRequestLog(UserRequestLogDto $data): UserRequestLog
    {
        $userRequestLogModel = new UserRequestLog();

        $userRequestLogModel->user_id = $data->userId;
        $userRequestLogModel->token_id = $data->tokenId;
        $userRequestLogModel->request_method = $data->requestMethod;
        $userRequestLogModel->request_params = $data->requestParams;

        $userRequestLogModel->save();

        return $userRequestLogModel;
    }

    public function getRquestLogs(): Collection
    {
        return UserRequestLog::get();
    }

    public function getRequestLogById(int $id): Collection
    {
        return UserRequestLog::where('id', $id)->get();
    }
}
