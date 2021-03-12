<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['employee_name', 'employee_email', 'employee_gender', 'employee_address'];

    public function noticeTable()
    {
        return $this->db->table($this->table)->where('deleted_at', NULL);
    }

    public function getEmployeeNames()
    {
        return $this->db->table($this->table)
            ->select('id, employee_name')->where('deleted_at', NULL)->get()->getResultArray();
    }

    public function button()
    {
        $buttonFun = function ($row) {
            return '<button type="button" class="btn btn-info edit" data-id="' . $row['id'] . '"
            data-toggle="modal" data-target="#employeeModal">Edit</button>
            &nbsp; 
            <button type="button" class="btn btn-danger delete" 
            data-id="' . $row['id'] . '">Delete</button></a>';
        };
        return $buttonFun;
    }
}
