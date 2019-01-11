<?php
namespace App\Traits;

trait UploadBase64Files
{
    /**
     * Upload Profile Pic base64 image
     *
     * @param $file
     * @param $imagePath
     * @return string
     */
    public function uploadBase64Files($file, $imagePath) : string
    {
        $img = explode(',', $file);
        $ini =substr($img[0], 11);
        $type = explode(';', $ini);

        $file = base64_decode($img[1]);
        $fileName = time().uniqid(rand()).'.'.$type[0];
        $destinationPath = public_path('/'.$imagePath );
        $imagePath = $imagePath . $fileName;
        file_put_contents($destinationPath.$fileName, $file);

        return $imagePath;
    }
}