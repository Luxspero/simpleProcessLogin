<?php

namespace App\Controllers;

use App\Models\M_Penduduk;

class Home extends BaseController
{
    protected $modelPenduduk;

    public function __construct()
    {
    }

    public function index()
    {
        if (!isset(session()->user['id_user'])) {
            return redirect()->to(base_url('login'));
        }

        $data = [
            'judul' => 'Dashboard'
        ];
        echo view('template/v_header', $data);
        echo view('template/v_topbar');
        echo view('template/v_sidebar');
        echo view('Home/index');
        echo view('template/v_footer');
    }
}
