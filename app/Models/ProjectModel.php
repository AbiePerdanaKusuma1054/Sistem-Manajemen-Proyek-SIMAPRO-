<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'project';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'project_name', 'client_id', 'project_manager', 'project_start',
        'project_finish', 'project_desc', 'project_status'
    ];

    public function noticeTable()
    {
        $builder = $this->db->table('client')
            ->join($this->table, 'project.client_id = client.id');
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

    public function startDate()
    {
        $startDateFun = function ($row) {

            return date('d/m/Y', strtotime($row['project_start']));
        };

        return $startDateFun;
    }

    public function finishDate()
    {
        $finishDateFun = function ($row) {

            return date('d/m/Y', strtotime($row['project_finish']));
        };

        return $finishDateFun;
    }

    public function button()
    {
        $buttonFun = function ($row) {
            return '<a href="' . base_url() . '/project/detail/' . $row['id'] . '">
            <button type="button" class="btn btn-info">Detail</button></a>';
        };
        return $buttonFun;
    }

    public function getProjectDetail($id)
    {
        $builder = $this->db->table('client')
            ->join($this->table, 'project.client_id = client.id')
            ->where('project.id', $id)
            ->get()->getResultArray();

        // dd($builder);

        return $builder;
    }
}
