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
        $closureFun = function ($row) {
            return '<button type="button" name="editUser" class="btn btn-info edit" data-id="' . $row['id'] . '"
            data-toggle="modal" data-target="#editUserModal">Edit</button>
            &nbsp; 
            <button type="button" class="btn btn-danger delete" 
            data-id="' . $row['id'] . '">Delete</button></a>';
        };
        return $closureFun;
    }
}
