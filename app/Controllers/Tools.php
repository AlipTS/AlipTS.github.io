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
        $run = $this->image->withFile($bahan)
            ->convert(IMAGETYPE_PNG);
        dd($run->move('img/filettjpgtopng/a.png'));
        // ->move('img/filettjpgtopng/' . $bahan . '.png');



        // $imageObject = imagecreatefromjpeg($bahan);
        // $namaImg = $bahan->getRandomName();

        // $conv = imagepng($imageObject, 'img/filettjpgtopng/' . $namaImg . '. png');

        $this->TTJpgToPngModel->save([
            'img_file' => 'writable/img/filettjpgtopng/' . $bahan . '.png',
        ]);

        dd('berhasil up ke db dan img/tt');
        $data = [
            'title' => "JPG TO PNG",
            'image' => 'a'
        ];
        return view('Tools/dashboardTools', $data);
    }
}
