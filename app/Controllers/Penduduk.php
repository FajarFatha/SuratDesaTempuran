<?php

namespace App\Controllers;

use App\Models\PendudukModel;

class Penduduk extends BaseController
{
    protected $PendudukModel;
    public function __construct()
    {
        $this->PendudukModel = new PendudukModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Penduduk',
            'active' => ' ',
            'active1' => ' ',
            'active2' => ' ',
            'penduduk' => $this->PendudukModel->getPenduduk()
        ];
        return view('penduduk/index', $data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Penduduk',
            'active' => ' ',
            'active1' => ' ',
            'active2' => 'active',
            'penduduk' => $this->PendudukModel->getPenduduk($id)
        ];
        return view('penduduk/detail', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Penduduk',
            'active' => ' ',
            'active1' => ' ',
            'active2' => 'active',
            'validation' => \Config\Services::validation()
        ];
        return view('penduduk/tambah', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[penduduk.nik]',
                'errors' => [
                    'required' => '{field} nik harus diisi',
                    'is_unique' => '{field} nik sudah ada'
                ],
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/tambahpenduduk')->withInput()->with('validation', $validation);
            // return redirect()->to('/tambahpenduduk')->withInput();
        }
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        // dd($this->request->getVar());
        $tanggallahir = $this->request->getVar('tanggallahir');
        $tanggallahird = date('d', strtotime($tanggallahir));
        $tanggallahirm = date('m', strtotime($tanggallahir));
        $tanggallahiry = date('Y', strtotime($tanggallahir));
        $tanggallahir = "$tanggallahird $monthList[$tanggallahirm] $tanggallahiry";
        $save = $this->PendudukModel->save([
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'tempatlahir' => $this->request->getVar('tempatlahir'),
            'tanggallahir' => $tanggallahir,
            'kelamin' => $this->request->getVar('kelamin'),
            'darah' => $this->request->getVar('darah'),
            'alamat' => $this->request->getVar('alamat'),
            'rt' => $this->request->getVar('rt'),
            'rw' => $this->request->getVar('rw'),
            'desa' => $this->request->getVar('desa'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'agama' => $this->request->getVar('agama'),
            'status' => $this->request->getVar('status'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
        ]);
        if ($save) {
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to('/penduduk');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Penduduk',
            'active' => ' ',
            'active1' => ' ',
            'active2' => 'active',
            'validation' => \Config\Services::validation(),
            'penduduk' => $this->PendudukModel->getPenduduk($id)
        ];
        return view('penduduk/edit', $data);
    }
    public function update($id)
    {
        $monthList = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $tanggallahir = $this->request->getVar('tanggallahir');
        $_SESSION['tanggallahir'] = $tanggallahir;
        $tanggallahird = date('d', strtotime($tanggallahir));
        $tanggallahirm = date('m', strtotime($tanggallahir));
        $tanggallahiry = date('Y', strtotime($tanggallahir));
        $tanggallahir = "$tanggallahird $monthList[$tanggallahirm] $tanggallahiry";
        $save = $this->PendudukModel->update($id, [
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'tempatlahir' => $this->request->getVar('tempatlahir'),
            'tanggallahir' => $tanggallahir,
            'kelamin' => $this->request->getVar('kelamin'),
            'darah' => $this->request->getVar('darah'),
            'alamat' => $this->request->getVar('alamat'),
            'rt' => $this->request->getVar('rt'),
            'rw' => $this->request->getVar('rw'),
            'desa' => $this->request->getVar('desa'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'agama' => $this->request->getVar('agama'),
            'status' => $this->request->getVar('status'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubahkan');
        return redirect()->to('/penduduk');
    }
    public function delete($id)
    {
        $this->PendudukModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/penduduk');
    }
}
