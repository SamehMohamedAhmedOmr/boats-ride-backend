<?php

namespace Modules\Yacht\Transformers\Frontend;

use Illuminate\Http\Request;
use Modules\Yacht\Transformers\CMS\YachtResource as CmsYachtResource;

class YachtResource extends CmsYachtResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
