<?php

namespace App\Controllers;

class Tools extends BaseController
{
    public function index()
    {
        return view('Tools/dashboardTools');
    }

    public function jpgToPng()
    {
        return view('Tools/jpgToPng');
    }
    public function jpgToPng_convert()
    {
        $bahan = $this->request->getFile('fileJpgToPng');
        $imageObject = imagecreatefromjpeg($bahan);

        header('Content-type: image/png');
        $a = imagepng($imageObject);
        imagedestroy($imageObject);
        $data = [
            'title' => "JPG TO PNG",
            'image' => $a
        ];


        return view('Tools/dashboardTools', $data);
    }
}
