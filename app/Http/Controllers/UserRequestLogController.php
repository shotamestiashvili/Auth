<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserRequestLogResource;
use App\Repositories\UserRequestLogRepositoryInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRequestLogController extends Controller
{
    public function __construct(
        private readonly UserRequestLogRepositoryInterface $logRepository
    )
    {
    }

    /**
     * Retrieve and return a collection of user request logs.
     *
     * @return JsonResource A collection of UserRequestLogResource instances.
     */
    public function index(): JsonResource
    {
        return UserRequestLogResource::collection(
            $this->logRepository->getRquestLogs()
        );
    }

    /**
     * Retrieve and return a specific user request log by its ID.
     *
     * @param int $id The ID of the requested user request log.
     * @return JsonResource A collection of UserRequestLogResource instances.
     */
    public function show(int $id): JsonResource
    {
        return UserRequestLogResource::collection(
            $this->logRepository->getRequestLogById($id)
        );
    }
}
