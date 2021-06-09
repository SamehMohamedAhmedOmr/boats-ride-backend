<?php

namespace Modules\Yacht\Transformers\CMS;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Yacht\Transformers\CMS\EnumResource;

class YachtEnumsResource extends JsonResource
{
    private $yacht_types;
    private $yacht_status;
    private $fuel_types;
    private $hull_types;
    private $engine_types;
    
    public function __construct(
        $yacht_types,
        $yacht_status,
        $fuel_types,
        $hull_types,
        $engine_types
    ) {
        parent::__construct($yacht_types);
        $this->yacht_types = $yacht_types;
        $this->yacht_status = $yacht_status;
        $this->fuel_types = $fuel_types;
        $this->hull_types = $hull_types;
        $this->engine_types = $engine_types;
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
            'yacht_types'=> EnumResource::collection($this->yacht_types),
            'yacht_status'=>EnumResource::collection($this->yacht_status),
            'fuel_types'=>EnumResource::collection($this->fuel_types),
            'hull_types'=>EnumResource::collection($this->hull_types),
            'engine_types'=>EnumResource::collection($this->engine_types),
        ];
    }
}
