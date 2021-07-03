<?php

namespace Modules\Users\Transformers;

use Illuminate\Http\Request;
use Modules\ACL\Transformers\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Users\Transformers\PermissionResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'is_active' => $this->is_active,
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
            'permissions' => PermissionResource::collection($this->whenLoaded('permissions')),
        ];
    }
}
