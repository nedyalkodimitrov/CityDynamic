<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class MediaService
{
    const IMAGE_PATH = 'images';

    public static function saveImage(UploadedFile $image)
    {
        $imageName = time().'-'.rand(1, 15000000000).'.'.$image->extension();
        $image->move(public_path(self::IMAGE_PATH), $imageName);

        return $imageName;
    }
}
