<?php

namespace App\Models;

use CodeIgniter\Model;

class ttjpgtopngModel extends Model
{
    protected $table = 'TTJpgToPng';
    protected $allowedFields = ['id', 'img_file'];

    public function getImage($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
