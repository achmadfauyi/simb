<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    public function getMenu()
    {
        $builder = $this->db->table('menu');
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
