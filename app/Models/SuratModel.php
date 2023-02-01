<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\RawSql;

class SuratModel extends Model
{
    protected $table = 'surat';
    protected $useTimestamps = true;
    protected $allowedFields = ['surat', 'title', 'nourut', 'klasifikasi', 'slug'];

    public function getSurat($slug=false)
    {
        if($slug==false){
            return $this->findAll();
        }
        
        return $this->where(['slug'=>$slug])->first();
    }
    public function search($keyword)
    {
        // $builder = $this->table('surat');
        // $builder->select("(SELECT * FROM surat WHERE surat LIKE '%$keyword%') AS surat");
        // $query = $builder->get();
        // return $query;

        return $this->table('surat')->like('surat', $keyword)->orLike('title', $keyword);

        // $query = $this->db->query("SELECT * FROM surat WHERE surat LIKE '%$keyword%'");
        // return $query;
    }
}
