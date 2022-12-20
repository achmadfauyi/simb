<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        return view('login');
    }

    public function cekUsername()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $username2 = $model->cekUsername($username)->getResult();
        $count2 = count($username2);
        if (empty($count2)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function register()
    {
        if ($this->request->getPost()) {
            $userModel = new \App\Models\UserModel();
            $user = new \App\Entities\User();

            $username = $this->request->getPost('username');
            $user->username = $username;
            $user->password = $this->request->getPost('password');

            $userModel->save($user);

            $uuid = service('uuid');
            // will prepare UUID4 object
            $uuid4 = $uuid->uuid4();
            // will assign UUID4 as string
            $string = $uuid4->toString();
            // will assign UUID4 as byte string
            $byte_string = $uuid4->getBytes();

            $data = [
                'user_id' => $string,
            ];
            $userModel->updateUserId($data, $username);

            $this->session->setFlashdata('success', ['User Berhasil Ditambahkan']);
            return redirect()->to(site_url('Auth/login'));
        }
        return view('register');
    }

    public function login()
    {
        if ($this->request->getPost()) {

            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');
            $errors = $this->validation->getErrors();

            $userModel = new \App\Models\UserModel();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $userModel->where('username', $username)->first();

            if ($user) {
                $status = $user['status'];
                if ($user['password'] !== md5($status . $password)) {
                    $this->session->setFlashdata('errors', ['Password Salah']);
                } else {
                    $sessData = [
                        'username' => $user['username'],
                        'isLoggedIn' => TRUE
                    ];

                    $this->session->set($sessData);
                    return redirect()->to(site_url('Dashboard'));
                }
            } else {
                $this->session->setFlashdata('errors', ['User Tidak Ditemukan']);
                return redirect()->to(site_url('Auth'));
            }
        }
        return redirect()->to(site_url('Auth'));
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('Auth/login'));
    }
}
