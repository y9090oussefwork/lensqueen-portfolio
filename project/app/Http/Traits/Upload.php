<?php

namespace App\Http\Traits;

use Intervention\Image\Facades\Image;

trait Upload
{
    public function makeDirectory($path)
    {
        if (file_exists($path)) return true;
        return mkdir($path, 0755, true);
    }

    public function removeFile($path)
    {
        return file_exists($path) && is_file($path) ? @unlink($path) : false;
    }

    public function uploadImage($file, $location, $size = null, $old = null, $thumb = null, $filename = null, $waterMark = null)
    {
        $path = $this->makeDirectory($location);
        if (!$path) throw new \Exception('File could not been created.');

        if (!empty($old)) {
            $this->removeFile($location . '/' . $old);
            $this->removeFile($location . '/thumb_' . $old);
        }

        if ($filename == null) {
            $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
        }

        $image = Image::make($file);

        if (!empty($size)) {
            $size = explode('x', strtolower($size));
            $image->resize($size[0], $size[1]);
        }

        if (!empty($waterMark)) {
            $getMarkImg = Image::make(config('location.logoIcon.path').'logo.png');
            $width = $image->width() * $getMarkImg->width()/1000;
            $height = $image->height() *$getMarkImg->height()/1000;

            $watermark = $getMarkImg->resize($width, $height, function ($c) {
            })->opacity(50)->greyscale();

            $image->insert($watermark, 'center');

            $heightY = (int) ($image->height()/10);
            $widthX = (int) ($image->width()/10);

            $image->insert($watermark, 'top-left',$widthX,$heightY);
            $image->insert($watermark, 'top-right',$widthX,$heightY);
            $image->insert($watermark, 'bottom-left',$widthX,$heightY);
            $image->insert($watermark, 'bottom-right',$widthX,$heightY);
        }

        $image->save($location . '/' . $filename);


        if (!empty($thumb)) {
            $thumb = explode('x', strtolower($thumb));
            Image::make($file)->resize($thumb[0], $thumb[1])->save($location . '/thumb_' . $filename);
        }
        return $filename;
    }


}

