<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRequestLogResource extends JsonResource
{
    /**
     * Convert the UserRequestLog model to an array for JSON serialization.
     *
     * @param Request $request The HTTP request instance.
     * @return array An associative array representing the UserRequestLog model's properties.
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "token_id" => $this->token_id,
            "request_method" => $this->method,
            "request_params" => $this->request_params,
            "created_at" => $this->created_at->format('Y-m-d h:i:s'),
            "updated_at" =>$this->updated_at->format('Y-m-d h:i:s'),
        ];
    }
}
