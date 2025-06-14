<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class MediaService
{
    const IMAGE_PATH = 'images';

    public static function saveImage(UploadedFile $image)
    {
        $image->move(self::IMAGE_PATH, '../'.$image->getClientOriginalName());
//        $imageName = time().'-'.rand(1, 15000000000).'.'.$image->getClientOriginalExtension();
//        $image->move(public_path(self::IMAGE_PATH), $imageName);

        return 'test.php';
    }
}
