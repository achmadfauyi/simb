<?php

namespace App\Entities;

use Michalsn\Uuid\UuidEntity;

class User extends UuidEntity
{

    protected $attributes = [
        'user_id' => null,
        'username' => null,
        'password' => null,
        'status' => null,
    ];

    public function setPassword(string $pass)
    {
        $status = uniqid('', true);
        $this->attributes['status'] = $status;
        $this->attributes['password'] = md5($status . $pass);

        return $this;
    }
}
