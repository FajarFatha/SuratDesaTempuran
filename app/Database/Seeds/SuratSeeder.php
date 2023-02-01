<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class SuratSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'      => 'Beli BBM',
                'surat'      => 'Surat Keterangan Izin Beli BBM',
                'nourut'     => '01',
                'klasifikasi'     => '474',
                'slug'       => 'belibbm',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Belum Menikah',
                'surat'      => 'Surat Keterangan Belum Pernah Menikah',
                'nourut'     => '01',
                'klasifikasi'     => '472',
                'slug'       => 'belummenikah',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Dispensasi',
                'surat'      => 'Surat Keterangan Dispensasi',
                'nourut'     => '01',
                'klasifikasi'     => '474',
                'slug'       => 'dispensasi',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Domisili',
                'surat'      => 'Surat Keterangan Domisili',
                'nourut'     => '01',
                'klasifikasi'     => '472',
                'slug'       => 'domisili',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Identitas',
                'surat'      => 'Surat Keterangan Identitas',
                'nourut'     => '01',
                'klasifikasi'     => '472',
                'slug'       => 'identitas',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Izin Cuti',
                'surat'      => 'Surat Keterangan Izin Cuti',
                'nourut'     => '01',
                'klasifikasi'     => '850',
                'slug'       => 'izincuti',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Izin Keramaian',
                'surat'      => 'Surat Permohonan Izin Keramaian',
                'nourut'     => '01',
                'klasifikasi'     => '300',
                'slug'       => 'izinkeramaian',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Izin Mendirikan Terop',
                'surat'      => 'Surat Permohonan Izin Mendirikan Terop di Jalan',
                'nourut'     => '01',
                'klasifikasi'     => '300',
                'slug'       => 'izinterop',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Izin Pendirian',
                'surat'      => 'Surat Keterangan Izin Pendirian',
                'nourut'     => '01',
                'klasifikasi'     => '472',
                'slug'       => 'izinpendirian',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Keterangan Kehilangan',
                'surat'      => 'Surat Keterangan Kehilangan',
                'nourut'     => '01',
                'klasifikasi'     => '470',
                'slug'       => 'keteranganhilang',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Keterangan Kelahiran',
                'surat'      => 'Surat Keterangan Kelahiran',
                'nourut'     => '01',
                'klasifikasi'     => '472',
                'slug'       => 'keterangankelahiran',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Keterangan Kematian',
                'surat'      => 'Surat Keterangan Kematian',
                'nourut'     => '01',
                'klasifikasi'     => '472',
                'slug'       => 'keterangankematian',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Keterangan Merantau',
                'surat'      => 'Surat Keterangan Merantau',
                'nourut'     => '01',
                'klasifikasi'     => '472',
                'slug'       => 'keteranganmerantau',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Keterangan Lain',
                'surat'      => 'Surat Keterangan Lain-lain',
                'nourut'     => '01',
                'klasifikasi'     => '472',
                'slug'       => 'keteranganlain',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Keterangan Usaha',
                'surat'      => 'Surat Keterangan Usaha',
                'nourut'     => '01',
                'klasifikasi'     => '510',
                'slug'       => 'usaha',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Perintah Tugas',
                'surat'      => 'Surat Perintah Tugas',
                'nourut'     => '01',
                'klasifikasi'     => '188',
                'slug'       => 'perintahtugas',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Pernyataan Miskin',
                'surat'      => 'Surat Pernyataan Miskin',
                'nourut'     => '01',
                'klasifikasi'     => '440',
                'slug'       => 'pernyataanmiskin',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'SKCK',
                'surat'      => 'Surat Keterangan Catatan Kepolisian',
                'nourut'     => '01',
                'klasifikasi'     => '145',
                'slug'       => 'skck',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'SKTM',
                'surat'      => 'Surat Keterangan Tidak Mampu',
                'nourut'     => '01',
                'klasifikasi'     => '401',
                'slug'       => 'sktm',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'SPPD',
                'surat'      => 'Surat Perintah Perjalanan Dinas',
                'nourut'     => '01',
                'klasifikasi'     => '090',
                'slug'       => 'sppd',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Surat Kuasa',
                'surat'      => 'Surat Kuasa',
                'nourut'     => '01',
                'klasifikasi'     => '',
                'slug'       => 'kuasa',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'title'      => 'Undangan',
                'surat'      => 'Undangan',
                'nourut'     => '01',
                'klasifikasi'     => '005',
                'slug'       => 'undangan',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        $this->db->table('surat')->insertBatch($data);
    }
}
