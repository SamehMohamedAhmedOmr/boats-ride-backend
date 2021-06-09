<?php


namespace Modules\Base\Services\Classes;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Modules\Base\Facade\Errors;

class MediaService
{
    /**
     * Upload the given image.
     *
     * @param object $image
     * @param string $dir
     * @return string
     */
    public function uploadImage($image, $dir)
    {
        $image = Image::make($image);
        return $this->saveImage($image, $dir);
    }

    /**
     * Upload the given image.
     *
     * @param object $image
     * @param string $dir
     * @return string
     */
    public function uploadImageBas64($image, $dir)
    {
        if (!strlen($image)) {
            return null;
        }
        if (filter_var($image, FILTER_VALIDATE_URL)) {
            return $image;
        }
        try {
            $base = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image));
            $image = Image::make($base);
        } catch (\Exception $e) {
            Errors::cannotUploadImage();
        }
        return $this->saveImage($image, $dir);
    }

    /**
     * Delete the given image.
     *
     * @param object $path
     * @return void
     */
    public function deleteImage($path)
    {
        Storage::delete($path);
    }

    /**
     * Return full url of the given image.
     *
     * @param string $image
     * @return string
     */
    public static function constructUrl($image)
    {
        return $image ? (filter_var($image, FILTER_VALIDATE_URL) ? $image : url(Storage::url($image))) : null;
    }

    /**
     * Save the given image.
     *
     * @param object $image
     * @param string $dir
     * @return string
     */
    protected function saveImage($image, $dir)
    {
        $imageName = 'image' . uniqid() . time() . '.jpg';
        $path = 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $imageName;
        Storage::put($path, $image->stream());
        return 'uploads' . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $imageName;
    }


    public function generateThumbnailBas64($image_file, $folder)
    {
        $destinationPath =  'uploads' . DIRECTORY_SEPARATOR . $folder  . DIRECTORY_SEPARATOR . 'thumbnail';

        $image_file = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image_file));

        $thumbnail_image_name = md5('thumb' . uniqid() . time()) . '.jpg';

        
        $image = Image::make($image_file);

        $image->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })->stream();

        Storage::disk('public')->put($destinationPath . '/' . $thumbnail_image_name, $image);

        return $destinationPath . '/' . $thumbnail_image_name;
    }

}
