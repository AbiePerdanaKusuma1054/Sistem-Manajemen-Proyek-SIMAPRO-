<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use monken\TablesIgniter;

class Project extends BaseController
{

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
    }

    public function index()
    {
        return view('project/index');
    }

    public function add()
    {
        return view('project/add');
    }

    public function detail()
    {
        return view('project/detail');
    }

    public function edit()
    {
        return view('project/edit');
    }

    public function fetchProjectData()
    {
        $table = new TablesIgniter();

        $table->setTable($this->projectModel->noticeTable())
            ->setDefaultOrder('project_name', 'ASC')
            ->setOrder([
                'project_name', 'client_name', 'pm_name',
                'start_date', 'finish_date', 'project_status', null
            ])
            ->setSearch(['project_name', 'client_name', 'pm_name', 'project_status'])
            ->setOutput([
                'project_name', 'client_name', 'pm_name', 'start_date',
                'finish_date', $this->projectModel->status(), $this->projectModel->button()
            ]);
        return $table->getDatatable();
    }
}
