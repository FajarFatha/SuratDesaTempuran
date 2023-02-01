<?php

namespace App\Models;

use CodeIgniter\Model;

class TertandaModel extends Model
{
    protected $table = 'tertanda';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama','jabatan','alamat'];

    public function getTertanda()
    {
        return $this->first();
    }
}
