<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\KategoriModel;
use App\Models\MenuModel;
use  Geeklabs\Breadcrumbs\Core\Breadcrumbs;

class Kategori extends BaseController
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
            $data['title'] = "Kategori";
            $data['username'] = $session->get('username');
            $username = $data['username'];
            $model = new MenuModel();
            $model2 = new KategoriModel();
            $data['username'] = $username;
            $data['menu'] = $model->getMenu()->getResult();
            $data['tb_kategori'] = $model2->getKategori()->getResult();
            echo view('kategori', $data);
        else :
            return redirect()->to(site_url('Home'));
        endif;
    }

    public function save()
    {
        $model = new KategoriModel();
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        $string = $uuid4->toString();
        $data = [
            'kategori_id' => $string,
            'kategori' => $this->request->getPost('kategori'),
        ];
        $model->saveKategori($data);

        $this->session->setFlashdata('success', ['Data Berhasil Ditambahkan']);
        return redirect()->to('/Kategori');
    }

    public function update()
    {
        $model = new KategoriModel();
        $kategori_id = $this->request->getPost('kategori_id');
        $data = [
            'kategori' => $this->request->getPost('kategori'),
        ];
        $model->updateKategori($data, $kategori_id);

        $this->session->setFlashdata('success', ['Data Berhasil Diubah']);
        return redirect()->to('/Kategori');
    }

    public function delete()
    {
        $model = new KategoriModel();
        $kategori_id = $this->request->getPost('kategori_id');
        $model->deleteKategori($kategori_id);
        $this->session->setFlashdata('success', ['Data Berhasil Dihapus']);
        return redirect()->to('/Kategori');
    }
}
