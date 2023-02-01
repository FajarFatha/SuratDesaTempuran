<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('pages/index', $data);
    }
    public function ceklogin()
    {
        $userModel = new \App\Models\UserModel();
        $login = $this->request->getVar('login');
        if ($login) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            // dd($username, $password);
            $dataUser = $userModel->where("username", $username)->first();
            if ($dataUser) {
                if ($dataUser['password'] != md5($password)) {
                    $err = 'Password yang anda masukkan salah';
                } else {
                    $dataSesi = [
                        'id' => $dataUser['id'],
                        'username' => $dataUser['username'],
                        'password' => $dataUser['password'],
                    ];
                    session()->set($dataSesi);
                    return redirect()->to('/pages');
                }
            } else {
                $err = 'Username yang anda masukkan salah';
            }
            if ($err) {
                session()->setFlashdata('error', $err);
                return redirect()->to('/');
            }
        }
        return view('pages/index');
    }
    public function logout()
    {
        session()->destroy();
        $data = [
            'title' => 'Login',
            'active' => '',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('pages/index', $data);
    }
}
