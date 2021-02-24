<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'id';
    protected $allowedFields = ['client_name', 'client_email', 'client_address'];

    public function noticeTable()
    {
        $builder = $this->db->table($this->table);
        return $builder;
    }


    public function button()
    {
        $buttonFun = function ($row) {
            return '<button type="button" class="btn btn-info edit" data-id="' . $row['id'] . '"
            data-toggle="modal" data-target="#clientModal">Edit</button>
            &nbsp; 
            <button type="button" class="btn btn-danger delete" 
            data-id="' . $row['id'] . '">Delete</button></a>';
        };
        return $buttonFun;
    }

    public function getClientNames()
    {
        $builder = $this->db->table($this->table)
            ->select('id, client_name')->get()->getResultArray();
        return $builder;
    }

    public function getDetail($id)
    {
        return $this->join('project', 'project.client_id = client.id')
            ->where('project.id', $id)->first();
    }
}
