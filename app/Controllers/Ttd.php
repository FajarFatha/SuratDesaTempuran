<?php

namespace App\Controllers;

use App\Models\TertandaModel;

class Ttd extends BaseController
{
    protected $TertandaModel;
    public function __construct()
    {
        $this->TertandaModel = new TertandaModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Yang Bertanda Tangan',
            'active' => ' ',
            'active1' => 'active',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda()
        ];
        return view('pages/ttd', $data);
    }
    public function edit()
    {
        $data = [
            'title' => 'Edit Data',
            'active' => ' ',
            'active1' => 'active',
            'active2' => ' ',
            'tertanda' => $this->TertandaModel->getTertanda()
        ];
        return view('pages/editttd', $data);
    }
    public function updatettd($id)
    {
        $save = $this->TertandaModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('ttdnama'),
            'jabatan' => $this->request->getVar('ttdjabatan'),
            'alamat' => $this->request->getVar('ttdalamat')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/ttd');
    }
}
