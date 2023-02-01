<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'index',
            'active' => 'active',
            'active1' => ' ',
            'active2' => ' '
        ];
        return view('pages/index', $data);
    }
}
