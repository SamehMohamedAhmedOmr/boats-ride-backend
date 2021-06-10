<?php


namespace Modules\Base\Services;

use Modules\Base\ResponseShape\ApiResponse;
use Modules\Base\Services\Classes\LaravelServiceClass;
use Modules\Base\Repositories\CountryRepository;
use Modules\Base\Transformers\CountryResource;

class CountryService extends LaravelServiceClass
{
    private $country_repository;

    public function __construct(CountryRepository $country_repository)
    {
        $this->country_repository = $country_repository;
    }

    public function index()
    {
        if (request('is_pagination')) {
            list($countries, $pagination) = parent::paginate($this->country_repository);
        } else {
            $countries = parent::all($this->country_repository);
            $pagination = null;
        }


        return ApiResponse::format(200, CountryResource::collection($countries), 'countries data retrieved successfully', $pagination);
    }



}
