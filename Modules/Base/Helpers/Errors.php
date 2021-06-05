<?php

namespace Modules\Base\Helpers;


use Illuminate\Validation\ValidationException;

class Errors
{

    /**
     * @throws ValidationException
     */
    public function cannotUploadImage()
    {
        throw ValidationException::withMessages([
            'image' => trans('base::errors.cannotUploadImage'),
        ]);
    }

}
