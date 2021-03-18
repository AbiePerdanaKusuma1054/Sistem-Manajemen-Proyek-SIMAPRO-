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
        return $this->db->table($this->table)->where('deleted_at', NULL);
    }

    public function button()
    {
        $buttonFun = function ($row) {
            return '<i class="fa fa-pencil act icon-edit-member edit" 
            data-target="#userModal" data-id="' . $row['id'] . '"></i>
            &nbsp; 
            <i class="fa fa-trash-o icon-del-team delete" data-id="' . $row['id'] . '"></i>';
        };
        return $buttonFun;
    }

    public function getLogin($username)
    {
        return $this->where('username', $username)->where('deleted_at', NULL)->get()->getRow();
    }
}
