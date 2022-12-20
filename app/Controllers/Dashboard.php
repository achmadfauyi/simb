<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\MenuModel;
use  Geeklabs\Breadcrumbs\Core\Breadcrumbs;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        if (session()->get('isLoggedIn')) :
            $bread = new Breadcrumbs();
            $data['breadcrumbs'] = $bread->buildAuto();
            $session = session();
            $data['title'] = "Dashboard";
            $data['username'] = $session->get('username');
            $username = $data['username'];
            $model = new MenuModel();
            $model2 = new DashboardModel();
            $data['username'] = $username;
            $data['menu'] = $model->getMenu()->getResult();
            $data['tb_menu'] = $model2->getMenu()->getResult();
            echo view('dashboard', $data);
        else :
            return redirect()->to(site_url('Home'));
        endif;
    }

    public function save()
    {
        $model = new DashboardModel();
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        $string = $uuid4->toString();
        $data = [
            'menu_id' => $string,
            'menu_label' => $this->request->getPost('menu_label'),
            'url'        => $this->request->getPost('url'),
        ];
        $model->saveMenu($data);

        $this->session->setFlashdata('success', ['Data Berhasil Ditambahkan']);
        return redirect()->to('/Dashboard');
    }

    public function update()
    {
        $model = new DashboardModel();
        $menu_id = $this->request->getPost('menu_id');
        $data = [
            'menu_label' => $this->request->getPost('menu_label'),
            'url'        => $this->request->getPost('url'),
        ];
        $model->updateMenu($data, $menu_id);

        $this->session->setFlashdata('success', ['Data Berhasil Diubah']);
        return redirect()->to('/Dashboard');
    }

    public function delete()
    {
        $model = new DashboardModel();
        $menu_id = $this->request->getPost('menu_id');
        $model->deleteMenu($menu_id);
        $this->session->setFlashdata('success', ['Data Berhasil Dihapus']);
        return redirect()->to('/Dashboard');
    }
}
