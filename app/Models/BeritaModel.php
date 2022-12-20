<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    public function getBerita()
    {
        $builder = $this->db->table('berita');
        $builder->join('kategori', 'berita.kategori_id = kategori.kategori_id', 'left');
        return $builder->get();
    }

    public function getkategori()
    {
        $builder = $this->db->table('kategori');
        return $builder->get();
    }

    public function saveBerita($data)
    {
        $query = $this->db->table('berita')->insert($data);
        return $query;
    }

    public function updateBerita($data, $berita_id)
    {
        $query = $this->db->table('berita')->update($data, array('berita_id' => $berita_id));
        return $query;
    }

    public function deleteBerita($berita_id)
    {
        $query = $this->db->table('berita')->delete(array('berita_id' => $berita_id));
        return $query;
    }
}
