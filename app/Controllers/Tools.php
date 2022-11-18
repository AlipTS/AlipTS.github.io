<?php

namespace App\Controllers;

class Tools extends BaseController
{
    protected $db, $ttjpgtopngModel, $image;

    public function __construct()
    {
        $this->db = \config\Database::connect();
        $this->builder = $this->db->table('TTJpgToPng');
        $this->TTJpgToPngModel = new \App\Models\ttjpgtopngModel();
        $this->image = \Config\Services::image();
    }
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
        // $run = $this->image->withFile($bahan)->convert(IMAGETYPE_PNG);

        // $run = explode(".",$bahan)[0];
        $namaImg = $bahan->getRandomName();
        $namaImg1 = explode('.', $namaImg);
        // $conv = imagepng($bahan, 'img/filettjpgtopng/' . $namaImg . '. png');
        $a = $this->image->withFile($bahan)->convert(IMAGETYPE_PNG);
        $b = 'img/filettjpgtopng/'. $namaImg1[0] . '.png';
        // dd($b);
        $run1 = $a->move('img/filettjpgtopng/', $namaImg1[0] . '.png');



        // $imageObject = imagecreatefromjpeg($bahan);


        $this->TTJpgToPngModel->save([
            'file_img' => $b
        ]);

        // dd('berhasil up ke db dan img/tt');
        $data = [
            'title' => "JPG TO PNG",
            'image' => $b
        ];
        return view('Tools/jpgToPng', $data);
    }
}
