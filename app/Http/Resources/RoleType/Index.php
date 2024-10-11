<?php

namespace App\Http\Resources\RoleType;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Index extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'roleType' => $this->role_type,
        ];
    }
}
