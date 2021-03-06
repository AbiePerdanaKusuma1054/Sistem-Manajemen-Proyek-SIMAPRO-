<?php

namespace App\Models;

use CodeIgniter\Model;

class PteamModel extends Model
{
    protected $table = 'pteam';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'project_id', 'employee_id', 'position_id'
    ];

    public function getMembers($id)
    {
        $getdata = $this->select('pteam.id, project_name, employee_name, position_name')
            ->join('project', 'pteam.project_id = project.id')
            ->join('employee', 'pteam.employee_id = employee.id')
            ->join('position', 'pteam.position_id = position.id')
            ->where('project.id', $id)->where('pteam.deleted_at', NULL)
            ->where('project.deleted_at', NULL)->get()->getResultArray();

        return $getdata;
    }
}
