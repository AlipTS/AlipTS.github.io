<?php

namespace App\Controllers;

class Tools extends BaseController
{
    public function index()
    {
        return view('Tools/dashboardTools');
    }

    public function referTo($referTo)
    {
        return view('Tools/' . $referTo);
    }

    public function jpgToPng()
    {
        echo ('masuk');
        return view('Tools/dashboardTools');
    }
}
