<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    public function getUser()
    {
        $builder = $this->db->table('user');
        return $builder->get();
    }

    public function getMenu()
    {
        $builder = $this->db->table('menu');
        return $builder->get();
    }

    public function getKategori()
    {
        $builder = $this->db->table('kategori');
        return $builder->get();
    }

    public function getBerita()
    {
        $builder = $this->db->table('berita');
        return $builder->get();
    }

    public function saveMenu($data)
    {
        $query = $this->db->table('menu')->insert($data);
        return $query;
    }

    public function updateMenu($data, $menu_id)
    {
        $query = $this->db->table('menu')->update($data, array('menu_id' => $menu_id));
        return $query;
    }

    public function deleteMenu($menu_id)
    {
        $query = $this->db->table('menu')->delete(array('menu_id' => $menu_id));
        return $query;
    }
}
