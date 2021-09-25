<?php

namespace Modules\Seo\Transformers\Frontend;

use Modules\Seo\Transformers\CMS\SeoResource as CMSSeoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoResource extends CMSSeoResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        if(! $this->resource){
            return;
        }

        return parent::toArray($request);
    }
}
