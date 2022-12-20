<?php

namespace App\Controllers;

use App\Models\MenuModel;
use App\Models\UserModel;
use  Geeklabs\Breadcrumbs\Core\Breadcrumbs;

class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        if (session()->get('isLoggedIn')) :
            $bread = new Breadcrumbs();
            $data['breadcrumbs'] = $bread->buildAuto();
            $session = session();
            $data['title'] = "User";
            $data['username'] = $session->get('username');
            $username = $data['username'];
            $model = new MenuModel();
            $model2 = new UserModel();
            $data['username'] = $username;
            $data['menu'] = $model->getMenu()->getResult();
            $data['tb_user'] = $model2->getUser($username)->getResult();
            echo view('user', $data);
        else :
            return redirect()->to(site_url('Home'));
        endif;
    }
    public function update()
    {
        if ($this->request->getPost()) {

            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'ganti');
            $errors = $this->validation->getErrors();

            if ($errors) {
                $this->session->setFlashdata('errors', $errors);
                return redirect()->to(site_url('User'));
            }

            $userModel = new \App\Models\UserModel();

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $userModel->where('username', $username)->first();

            if ($user) {
                $status = $user->status;
                if ($user->password !== md5($status . $password)) {
                    $this->session->setFlashdata('errors', ['Password Salah']);
                } else {
                    $user->password = $this->request->getPost('passwordbaru');
                    $userModel->save($user);
                    return redirect()->to(site_url('Auth/logout'));
                }
            }
        }
        return redirect()->to(site_url('User'));
    }
}
