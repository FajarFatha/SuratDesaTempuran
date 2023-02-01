<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class TertandaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'       => 'MUHAJI',
                'jabatan'     => 'Kepala Desa Tempuran',
                'alamat'     => 'Munggur',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        $this->db->table('tertanda')->insertBatch($data);
    }
}