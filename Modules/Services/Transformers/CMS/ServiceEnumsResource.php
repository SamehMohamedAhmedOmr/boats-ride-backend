<?php

namespace Modules\Services\Transformers\CMS;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Yacht\Transformers\CMS\EnumResource;

class ServiceEnumsResource extends JsonResource
{
    protected $price_models;

    public function __construct(
        $price_models
    ) {
        parent::__construct($price_models);
        $this->price_models = $price_models;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'price_models'=> EnumResource::collection($this->price_models) 
        ];
    }
}
