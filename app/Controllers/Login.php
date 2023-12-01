<?php

namespace App\Controllers;

use App\Models\M_User;

class Login extends BaseController
{ 
    public function __construct()
    {
        $this->modelUser = new M_User;
    }

    public function index()
    {
        echo view('Login/index');
    }

    public function login(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $md5Pass = md5($password);

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ]);

        if (!$valid) {
            $sessError = [
                'errUsername' => $validation->getError('username'),
                'errPassword' => $validation->getError('password')
            ];

            session()->setFlashdata($sessError);
            return redirect()->to(base_url('login'));
        }
        else {
            $cekUserLogin = $this->modelUser->get_data($username);
            //jika tidak ada user
            if ($cekUserLogin == null) {
                
                $sessError = [
                    'errUsername' => 'Maaf User tidak terdaftar, atau sudah tidak aktif. Silakan hubungi Admin.'
                ];
                session()->setFlashdata($sessError);
                return redirect()->to(base_url('login'));
            }
            else {
                $passDB = $cekUserLogin['password'];
                //jika password benar
                if ($md5Pass == $passDB) {
                    //simpan session login
                    $user = [
                        'user' => [
                            'id_user' => $cekUserLogin['id_user'],
                            'username' => $cekUserLogin['username'],
                            'name' => $cekUserLogin['name'],
                            'address' => $cekUserLogin['address'],
                            'statusUser' => $cekUserLogin['statusUser'],
                            'level_user' => $cekUserLogin['level_user'],
                        ]
                    ];
                    session()->set($user);

                    //update data login user
                    $dataLogin = [
                        'last_login_date' => date("Y-m-d H:i:s")
                    ];
                    $this->modelUser->edit($dataLogin, session()->user['id_user']);

                    //ke halaman utama
                    return redirect()->to(base_url());
                } else {
                    $sessError = [
                        'errPassword' => 'Maaf Password salah'
                    ];
    
                    session()->setFlashdata($sessError);
                    return redirect()->to(base_url('login'));
                }
            }
        }
    }

    //logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
