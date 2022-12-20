<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    public function getkategori()
    {
        $builder = $this->db->table('kategori');
        return $builder->get();
    }

    public function saveKategori($data)
    {
        $query = $this->db->table('kategori')->insert($data);
        return $query;
    }

    public function updateKategori($data, $kategori_id)
    {
        $query = $this->db->table('kategori')->update($data, array('kategori_id' => $kategori_id));
        return $query;
    }

    public function deleteKategori($kategori_id)
    {
        $query = $this->db->table('kategori')->delete(array('kategori_id' => $kategori_id));
        return $query;
    }
}
