<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Models\beritaModel;
use App\Models\MenuModel;
use  Geeklabs\Breadcrumbs\Core\Breadcrumbs;

class Berita extends BaseController
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
            $data['title'] = "Berita";
            $data['username'] = $session->get('username');
            $username = $data['username'];
            $model = new MenuModel();
            $model2 = new BeritaModel();
            $data['username'] = $username;
            $data['menu'] = $model->getMenu()->getResult();
            $data['tb_berita'] = $model2->getBerita()->getResult();
            $data['tb_kategori'] = $model2->getKategori()->getResult();
            echo view('berita', $data);
        else :
            return redirect()->to(site_url('Home'));
        endif;
    }

    public function save()
    {
        $model = new BeritaModel();
        $uuid = service('uuid');
        $uuid4 = $uuid->uuid4();
        $string = $uuid4->toString();
        $data = [
            'berita_id' => $string,
            'judul_berita' => $this->request->getPost('judul_berita'),
            'isi_berita' => $this->request->getPost('isi_berita'),
            'kategori_id' => $this->request->getPost('kategori_id'),
        ];
        $model->saveBerita($data);

        $this->session->setFlashdata('success', ['Data Berhasil Ditambahkan']);
        return redirect()->to('/Berita');
    }

    public function update()
    {
        $model = new BeritaModel();
        $berita_id = $this->request->getPost('berita_id');
        $data = [
            'judul_berita' => $this->request->getPost('judul_berita'),
            'isi_berita' => $this->request->getPost('isi_berita'),
            'kategori_id' => $this->request->getPost('kategori_id'),
        ];
        $model->updateBerita($data, $berita_id);

        $this->session->setFlashdata('success', ['Data Berhasil Diubah']);
        return redirect()->to('/Berita');
    }

    public function delete()
    {
        $model = new BeritaModel();
        $berita_id = $this->request->getPost('berita_id');
        $model->deleteBerita($berita_id);
        $this->session->setFlashdata('success', ['Data Berhasil Dihapus']);
        return redirect()->to('/Berita');
    }
}
