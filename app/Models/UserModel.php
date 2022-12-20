<?php

namespace App\Models;

use CodeIgniter\Model;
use Michalsn\Uuid\UuidModel;

class UserModel extends UuidModel
{
    protected $table      = 'user';
    protected $primaryKey = 'user_id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['username', 'password', 'status'];

    protected $useTimestamps = true;

    public function cekUsername($username)
    {
        $builder = $this->db->table('user');
        $builder->select('username');
        $builder->where('username', $username);
        return $builder->get();
    }

    public function updateUserId($data, $username)
    {
        $query = $this->db->table('user')->update($data, array('username' => $username));
        return $query;
    }

    public function getUser($username)
    {
        $builder = $this->db->table('user');
        $builder->where('username', $username);
        return $builder->get();
    }

    public function saveUser($data)
    {
        $query = $this->db->table('user')->insert($data);
        return $query;
    }

    public function updateUser($data, $user_id)
    {
        $query = $this->db->table('user')->update($data, array('user_id' => $user_id));
        return $query;
    }

    public function deleteUser($user_id)
    {
        $query = $this->db->table('user')->delete(array('user_id' => $user_id));
        return $query;
    }
}
