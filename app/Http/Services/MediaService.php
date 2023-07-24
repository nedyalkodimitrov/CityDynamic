<?php

namespace App\Http\Services;

use http\Env\Request;
use Illuminate\Http\UploadedFile;

class MediaService
{
    const IMAGE_PATH = "images";

    public function saveImage(UploadedFile $image)
    {

        $imageName = time().'-'.rand(1, 15000000000).'.'.$image->extension();
//        $image->move(public_path(self::IMAGE_PATH), $imageName);
        $this->compressImage($image, public_path(self::IMAGE_PATH).'/'.$imageName, 80);

        return $imageName;
    }

    function compressImage($source, $destination, $quality) {
        // Get image info
        $imgInfo = getimagesize($source);
        $mime = $imgInfo['mime'];

        // Create a new image from file
        switch($mime){
            case 'image/jpeg':
                $image = imagecreatefromjpeg($source);
                break;
            case 'image/png':
                $image = imagecreatefrompng($source);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($source);
                break;
            default:
                $image = imagecreatefromjpeg($source);
        }

        // Save image
        imagejpeg($image, $destination, $quality);

        // Return compressed image
        return $destination;
    }
}
