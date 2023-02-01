<?php

namespace App\Controllers;

use App\Models\SuratModel;

class DataSurat extends BaseController
{
    protected $SuratModel;
    public function __construct()
    {
        $this->SuratModel = new SuratModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if (isset($keyword)) {
            $surat = $this->SuratModel->search($keyword)->paginate(20, 'orang');
        } else {
            $surat = $this->SuratModel->getSurat();
        }
        $tampilkanSemua = $this->request->getVar('tampilkanSemua');
        if (isset($tampilkanSemua)) {
            $surat = $this->SuratModel->getSurat();
        }
        $data = [
            'title' => 'Home',
            'active' => ' ',
            'active1' => ' ',
            'active2' => 'active',
            'surat' => $surat
        ];
        return view('datasurat/datasurat', $data);
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Data Surat',
            'active' => ' ',
            'active1' => ' ',
            'active2' => 'active',
            'validation' => \Config\Services::validation(),
            'surat' => $this->SuratModel->getSurat($slug)
        ];
        return view('datasurat/edit', $data);
    }
    public function update($id)
    {
        $rule_surat = 'required';
        $rule_klasifikasi = 'required';
        $rule_nourut = 'required';
        if (!$this->validate([
            'surat' => [
                'rules' => $rule_surat,
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'klasifikasi' => [
                'rules' => $rule_klasifikasi,
                'errors' => [
                    'required' => '{field} surat harus diisi',
                ],
            ],
            'nourut' => [
                'rules' => $rule_nourut,
                'errors' => [
                    'required' => 'Nomor urut surat harus diisi',
                ],
            ],
        ])) {
            return redirect()->to('/surat/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $save = $this->SuratModel->save([
            'id' => $id,
            'surat' => $this->request->getVar('surat'),
            'slug' => $this->request->getVar('slug'),
            'klasifikasi' => $this->request->getVar('klasifikasi'),
            'nourut' => $this->request->getVar('nourut')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/surat');
    }
}
