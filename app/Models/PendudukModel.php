<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\RawSql;

class PendudukModel extends Model
{
    protected $table = 'penduduk';
    protected $useTimestamps = true;
    protected $allowedFields = ['nik', 'nama', 'tempatlahir', 'tanggallahir', 'kelamin', 'darah', 'alamat', 'rt', 'rw', 'desa', 'kecamatan', 'agama', 'status', 'pekerjaan', 'kewarganegaraan'];

    public function getPenduduk($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function getPendudukName($nama = false)
    {
        return $this->where(['nama' => $nama])->first();
    }
}
