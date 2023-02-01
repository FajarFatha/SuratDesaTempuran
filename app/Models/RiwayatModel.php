<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\RawSql;

class RiwayatModel extends Model
{
    protected $table = 'riwayat';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'namasurat', 'nourut'];

    public function getRiwayat($id=false)
    {
        if($id==false){
            return $this->findAll();
        }
        
        return $this->where(['id'=>$id])->first();
    }
}
