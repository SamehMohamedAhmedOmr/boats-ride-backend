<?php

namespace Modules\Gallery\Transformers\CMS;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Gallery\Facades\GalleryHelper;

class GalleryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request
     * @return array
     */
    public function toArray($request)
    {
        $folder = $this->galleryType->folder;

        $resource = [
            'id' => $this->id,
            'image' => GalleryHelper::getImagePath($folder, $this->image),
            'thumbnail' => GalleryHelper::getThumbnailPath($folder, $this->thumbnail),
        ];

        if ($this->pivot) {
            $resource['order'] = $this->pivot->order;
        }

        return  $resource;
    }
}
