<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'post';

    public function getLatest()
    {
        return $this->findAll();
    }

    public function getLatest2()
    {
        return $this
            ->asObject()
            ->orderBy('created_at', 'DESC')
            ->findAll()
        ;
    }
}