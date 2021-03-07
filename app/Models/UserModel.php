<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['username', 'password', 'role'];

    public function noticeTable()
    {
        $builder = $this->db->table($this->table)->where('deleted_at', NULL);
        return $builder;
    }

    public function button()
    {
        $buttonFun = function ($row) {
            return '<button type="button" name="editUser" class="btn btn-info edit" data-id="' . $row['id'] . '"
            data-toggle="modal" data-target="#userModal">Edit</button>
            &nbsp; 
            <button type="button" class="btn btn-danger delete" 
            data-id="' . $row['id'] . '">Delete</button></a>';
        };
        return $buttonFun;
    }

    public function getLogin($username)
    {
        return $this->where('username', $username)->where('deleted_at', NULL)->get()->getRow();
    }
}
