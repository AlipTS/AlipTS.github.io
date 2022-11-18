<?php

namespace App\Models;

use CodeIgniter\Model;

class ttjpgtopngModel extends Model
{
    protected $table = 'TTJpgToPng';
    protected $allowedFields = ['file_img'];

    public function getImage($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
