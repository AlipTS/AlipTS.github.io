<?php

namespace App\Controllers;

class Tools extends BaseController
{
    protected $db, $ttjpgtopngModel;

    public function __construct()
    {
        $this->db = \config\Database::connect();
        $this->builder = $this->db->table('TTJpgToPng');
        $this->TTJpgToPngModel = new \App\Models\ttjpgtopngModel();
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
        $imageObject = imagecreatefromjpeg($bahan);

        $namaImg = $bahan->getRandomName();
        $conv = imagepng($imageObject, 'img/filettjpgtopng/' . $namaImg . '. png');

        $this->TTJpgToPngModel->save([
            'img_file' => $namaImg,
        ]);

        dd('berhasil up ke db dan img/tt');
        $data = [
            'title' => "JPG TO PNG",
            'image' => $conv
        ];
        return view('Tools/dashboardTools', $data);
    }
}
