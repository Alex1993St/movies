<?php

namespace App\Services;

class File
{
    const NOIMAGE = 'no_image.png';

    /*
     * Unlink image
     */
    public static function removeFile($image)
    {
        unlink(storage_path('image') . '/'  . $image);
    }

    /*
     * Upload image
     */
    public static function uploadImage($data)
    {
        $imageName = time() . '.' . $data->image->extension();
        $data->image->move(storage_path('image'), $imageName);
        return $imageName;
    }

    /*
     * checked image and update if new image and remove old or return old image
     */
    public function actionFile($data)
    {
        if( $data->image ) {
            $image =  self::uploadImage($data);
            if( $data->old_image != self::NOIMAGE ) {
                self::removeFile($data->old_image);
            }
        } else {
            $image = $data->old_image;
        }

        return $image;
    }
}
