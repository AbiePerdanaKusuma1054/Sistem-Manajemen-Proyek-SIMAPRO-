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
            return '<i class="fa fa-pencil act icon-edit-member edit" 
            data-target="#employeeModal" data-id="' . $row['id'] . '"></i>
            &nbsp; 
            <i class="fa fa-trash-o icon-del-team delete" data-id="' . $row['id'] . '"></i>';
        };
        return $buttonFun;
    }
}
