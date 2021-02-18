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

    public function status()
    {
        $statusFun = function ($row) {

            if ($row['project_status'] == 'hold') {
                return '<span class="badge rounded-pill bg-primary">Hold</span>';
            } else if ($row['project_status'] == 'waiting') {
                return '<span class="badge rounded-pill bg-secondary">Waiting</span>';
            } else if ($row['project_status'] == 'on progress') {
                return '<span class="badge rounded-pill bg-info">On Progress</span>';
            } else if ($row['project_status'] == 'cancelled') {
                return '<span class="badge rounded-pill bg-light text-dark">Cancelled</span>';
            } else if ($row['project_status'] == 'finish') {
                return '<span class="badge rounded-pill bg-success">Finished</span>';
            } else {
                return '<span class="badge rounded-pill bg-dark">Unknown</span>';
            }
        };

        return $statusFun;
    }

    public function button()
    {
        $buttonFun = function ($row) {
            return '<a href="' . base_url() . '/project/detail">
            <button type="button" class="btn btn-info">Detail</button></a>';
        };
        return $buttonFun;
    }
}
