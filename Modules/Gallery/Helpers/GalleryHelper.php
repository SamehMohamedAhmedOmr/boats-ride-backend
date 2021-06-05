<?php

namespace Modules\Gallery\Helpers;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GalleryHelper
{
    // get Full Image Path
    public function getImagePath($folder_name, $image)
    {
        $path = 'public/images/'. $folder_name .'/'. $image ;
        return url(Storage::url($path));
    }

    // get Full Image Path
    public function getThumbnailPath($folder_name, $image)
    {
        $path = 'public/images/'. $folder_name .'/thumbnail/'. $image ;
        return url(Storage::url($path));
    }

}
