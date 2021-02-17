<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'project_name', 'client_name', 'pm_name', 'start_date',
        'finish_date', 'project_status'
    ];

    public function noticeTable()
    {
        $builder = $this->db->table($this->table);
        return $builder;
    }

    public function button()
    {
        $closureFun = function ($row) {
            return '<a href="' . base_url() . '/home/detailproject">
            <button type="button" class="btn btn-info">Detail</button></a>';
        };
        return $closureFun;
    }
}
