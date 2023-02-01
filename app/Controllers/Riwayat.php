<?php

namespace App\Controllers;

use App\Models\RiwayatModel;

class Riwayat extends BaseController
{
    protected $RiwayatModel;
    public function __construct()
    {
        $this->RiwayatModel = new RiwayatModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Riwayat',
            'active' => ' ',
            'active1' => ' ',
            'active2' => ' ',
            'riwayat' => $this->RiwayatModel->getRiwayat()
        ];
        return view('riwayat/index', $data);
    }
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Surat',
            'active' => ' ',
            'active1' => ' ',
            'active2' => 'active',
            'validation' => \Config\Services::validation(),
            'riwayat' => $this->RiwayatModel->getRiwayat($id)
        ];
        return view('riwayat/edit', $data);
    }
    public function update($id)
    {
        $rule_nama = 'required';
        $rule_namasurat = 'required';
        $rule_nourut = 'required';
        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Nama Pembuat harus diisi',
                ],
            ],
            'namasurat' => [
                'rules' => $rule_namasurat,
                'errors' => [
                    'required' => 'Nama surat harus diisi',
                ],
            ],
            'nourut' => [
                'rules' => $rule_nourut,
                'errors' => [
                    'required' => 'Nomor urut surat harus diisi',
                ],
            ],
        ])) {
            return redirect()->to('/riwayat/edit/' . $this->request->getVar('id'))->withInput();
        }

        $save = $this->RiwayatModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'namasurat' => $this->request->getVar('namasurat'),
            'nourut' => $this->request->getVar('nourut')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/riwayat');
    }
    public function delete($id)
    {
        $this->RiwayatModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/riwayat');
    }
}
