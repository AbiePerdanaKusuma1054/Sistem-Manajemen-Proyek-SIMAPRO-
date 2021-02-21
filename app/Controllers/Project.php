<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\ClientModel;
use monken\TablesIgniter;

class Project extends BaseController
{

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
        $this->clientModel = new ClientModel();
    }

    public function index()
    {
        $sessions = [
            'project_mode' => true,
            'dashboard_mode' => false,
            'user_mode' => false,
            'client_mode' => false
        ];

        session()->set($sessions);
        return view('project/index');
    }

    public function add()
    {
        if (session()->get('project_mode') == false) {
            return redirect()->to('/project');
        }

        $data = [
            'client' => $this->clientModel->getClientNames(),
            'validator' => \Config\Services::validation()
        ];

        return view('project/add', $data);
    }

    public function addProject()
    {
        $request = service('request');

        $rules = [
            'project_name' => 'required|max_length[50]',
            'project_manager' => 'required',
            'client_id' => 'required',
            'project_start' => 'required',
            'project_finish' => 'required'
        ];

        if ($this->validate($rules)) {
            $data = [
                'project_name' => $request->getVar('project_name'),
                'project_manager' => $request->getVar('project_manager'),
                'client_id' => intval($request->getVar('client_id')),
                'project_start' => $request->getVar('project_start'),
                'project_finish' => $request->getVar('project_finish'),
                'project_desc' => $request->getVar('project_desc'),
                'project_status' => 'waiting'
            ];

            $this->projectModel->insert($data);

            return redirect()->to('/project');
        } else {
            $validator = \Config\Services::validation();
            return redirect()->to('/project/add')->withInput()->with('validator', $validator);
        }
    }

    public function detail($id)
    {
        if (session()->get('project_mode') == false) {
            return redirect()->to('/project');
        }

        $data = [
            'detail' => $this->projectModel->getProjectDetail($id)
        ];

        return view('project/detail', $data);
    }

    public function edit($id)
    {
        if (session()->get('project_mode') == false) {
            return redirect()->to('/project');
        }

        $data = [
            'validator' => \Config\Services::validation(),
            'detail' => $this->projectModel->getProjectDetail($id),
            'client' => $this->clientModel->getClientNames()
        ];

        return view('project/edit', $data);
    }

    public function saveEditProject($id)
    {
        $request = service('request');

        $rules = [
            'project_name' => 'required|max_length[50]',
            'project_manager' => 'required',
            'client_id' => 'required',
            'project_start' => 'required',
            'project_finish' => 'required',
            'project_status' => 'required'
        ];

        if ($this->validate($rules)) {
            $data = [
                'project_name' => $request->getVar('project_name'),
                'project_manager' => $request->getVar('project_manager'),
                'client_id' => intval($request->getVar('client_id')),
                'project_start' => $request->getVar('project_start'),
                'project_finish' => $request->getVar('project_finish'),
                'project_desc' => $request->getVar('project_desc'),
                'project_status' => $request->getVar('project_status')
            ];

            $this->projectModel->update($id, $data);

            return redirect()->to('/project/detail/' . $id);
        } else {
            $validator = \Config\Services::validation();
            return redirect()->to('/project/edit/' . $id)->withInput()->with('validator', $validator);
        }
    }

    public function delete($id)
    {
        $this->projectModel->delete($id);
        return redirect()->to('/project');
    }

    public function fetchProjectData()
    {
        $table = new TablesIgniter();

        $table->setTable($this->projectModel->noticeTable())
            ->setDefaultOrder('project_name', 'ASC')
            ->setOrder([
                'project_name', 'client_name', 'project_manager',
                'project_start', 'project_finish', 'project_status', null
            ])
            ->setSearch(['project_name', 'client_name', 'project_manager', 'project_status'])
            ->setOutput([
                'project_name', 'client_name', 'project_manager', $this->projectModel->startDate(),
                $this->projectModel->finishDate(), $this->projectModel->status(), $this->projectModel->button()
            ]);
        return $table->getDatatable();
    }
}