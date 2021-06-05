<?php

namespace Modules\Base\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class UtilitiesHelper
{
    /**
     * @var object
     */
    private $address_repository;

    /**
     * Get district id from header or the logged in user.
     *
     * @return  integer
     */
    public function getDistrictId()
    {
        return Arr::get(getallheaders(), 'district-id', false) ?: $this->getUserDistrict(Auth::user());
    }


    public function prepareDeviceHeader()
    {
        $device_id = trim(Request::header('device_id'));
        $device_os = trim(Request::header('device_os'));
        $app_version = trim(Request::header('app_version'));

        return [
            (string)$device_id,
            (string)$device_os,
            (string)$app_version
        ];
    }

    public function getCountryId()
    {
        if (!request()->has('country_id')) {
            $country_id = Session::get('country_id');
        } else {
            $country_id = request('country_id');
        }
        return $country_id;
    }

    public function projectSlug(){
        $project_folder = Session::get(Session::get('current_sub_domain'));
        return isset($project_folder) ? $project_folder['slug'] : '8000';
    }

    public function addToCollection($array, $name_en, $name_ar){
        $array->push([
            'name' => [
                'en' => $name_en,
                'ar' => $name_ar
            ],
            'key' => str_replace(' ', '_', strtoupper($name_en))
        ]);
        return $array;
    }
}
