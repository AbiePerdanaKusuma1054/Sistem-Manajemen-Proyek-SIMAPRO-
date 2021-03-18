<?php

namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model
{
    protected $table = 'position';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['position_name', 'position_desc'];

    public function noticeTable()
    {
        return $this->db->table($this->table)->where('deleted_at', NULL);
    }

    public function button()
    {
        $buttonFun = function ($row) {
            return '<i class="fa fa-pencil act icon-edit-member edit" 
            data-target="#positionModal" data-id="' . $row['id'] . '"></i>
            &nbsp; 
            <i class="fa fa-trash-o icon-del-team delete" data-id="' . $row['id'] . '"></i>';
        };
        return $buttonFun;
    }

    public function getPositionNames()
    {
        return $this->db->table($this->table)
            ->select('id, position_name')->where('deleted_at', NULL)->get()->getResultArray();
    }
}
