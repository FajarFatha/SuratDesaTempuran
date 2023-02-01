<?php

namespace App\Controllers;

use App\Models\SuratModel;

class Pages extends BaseController
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
        if(isset($tampilkanSemua)){
            $surat = $this->SuratModel->getSurat();
        }
        $data = [
            'title' => 'Home',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' ',
            'surat' => $surat
        ];
        return view('pages/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'Home',
            'active' => ' ',
            'active1' => 'active',
            'active2' => ' '
        ];
        echo view('pages/about', $data);
        // echo 'Hello Pages';
    }
}
