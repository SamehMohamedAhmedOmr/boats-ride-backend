<?php

namespace Modules\Notifications\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class DeviceTokenResource extends JsonResource
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
            'device_id' => $this->device_id,
            'device_token' => $this->device_token,
            'device_os' => $this->device_os,
            'app_version' => $this->app_version
        ];
    }

    public static function prepareStoreMethod($mac_address)
    {
        $optional_array = [
            'device_token' => request('device_token'),
            'device_os' => request('device_os'),
            'app_version' => request('app_version'),
            'user_id' => Auth::id(),
        ];
        $required_array = [
            'device_id' => request('device_id', $mac_address)
        ];

        return [$optional_array,$required_array];
    }
}
