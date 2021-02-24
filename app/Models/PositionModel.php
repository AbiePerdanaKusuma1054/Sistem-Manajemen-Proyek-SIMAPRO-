<?php

namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model
{
    protected $table = 'position';
    protected $primaryKey = 'id';
    protected $allowedFields = ['position_name', 'position_desc'];

    public function noticeTable()
    {
        $builder = $this->db->table($this->table);
        return $builder;
    }


    public function button()
    {
        $buttonFun = function ($row) {
            return '<button type="button" class="btn btn-info edit" data-id="' . $row['id'] . '"
            data-toggle="modal" data-target="#positionModal">Edit</button>
            &nbsp; 
            <button type="button" class="btn btn-danger delete" 
            data-id="' . $row['id'] . '">Delete</button></a>';
        };
        return $buttonFun;
    }

    public function getPositionNames()
    {
        $builder = $this->db->table($this->table)
            ->select('id, position_name')->get()->getResultArray();
        return $builder;
    }
}
