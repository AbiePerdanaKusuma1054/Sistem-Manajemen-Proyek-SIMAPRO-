<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'role'];

    public function noticeTable()
    {
        $builder = $this->db->table($this->table);
        return $builder;
    }

    public function button()
    {
        $closureFun = function () {
            return '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal">Edit</button><a href=""><button type="button" class="btn btn-danger">Delete</button></a>';
        };
        return $closureFun;
    }
}
