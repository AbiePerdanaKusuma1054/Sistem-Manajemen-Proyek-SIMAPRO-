<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['client_name', 'client_email', 'client_address'];

    public function noticeTable()
    {
        return $this->db->table($this->table)->where('deleted_at', NULL);
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
        return $this->db->table($this->table)
            ->select('id, client_name')->where('deleted_at', NULL)->get()->getResultArray();
    }

    public function getDetail($id)
    {
        return $this->select('project.id, project_name, project_start, 
        project_finish, client_id, client_name, contract_amount, 
        project_desc, project_manager, project_status, project_progress')
            ->join('project', 'project.client_id = client.id')
            ->where('project.id', $id)->where('project.deleted_at', NULL)->first();
    }
}
