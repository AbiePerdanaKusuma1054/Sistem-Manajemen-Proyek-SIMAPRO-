<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\ClientModel;
use App\Models\EmployeeModel;
use App\Models\PositionModel;
use App\Models\PteamModel;
use App\Models\CommentModel;
use monken\TablesIgniter;

class Project extends BaseController
{

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
        $this->clientModel = new ClientModel();
        $this->employeeModel = new EmployeeModel();
        $this->positionModel = new PositionModel();
        $this->pteamModel = new PteamModel();
        $this->commentModel = new CommentModel();
    }

    public function index()
    {
        $sessions = [
            'project_mode' => true,
            'employee_mode' => false,
            'position_mode' => false,
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
            'employee' => $this->employeeModel->getEmployeeNames(),
            'validator' => \Config\Services::validation()
        ];

        return view('project/add', $data);
    }

    public function addProject()
    {
        $request = service('request');

        $rules = [
            'project_name' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Please input a project name.',
                    'max_length' => 'The name should not be more than 50 characters.'
                ]
            ],
            'project_manager' => 'required',
            'client_id' => 'required',
            'project_start' => 'required',
            'project_finish' => 'required',
            'contract_amount' => 'required|max_length[10]'
        ];

        if ($this->validate($rules)) {
            $data = [
                'project_name' => $request->getVar('project_name'),
                'project_manager' => $request->getVar('project_manager'),
                'client_id' => intval($request->getVar('client_id')),
                'project_start' => $request->getVar('project_start'),
                'project_finish' => $request->getVar('project_finish'),
                'contract_amount' => $request->getVar('contract_amount'),
                'project_desc' => $request->getVar('project_desc'),
                'project_status' => 'waiting'
            ];

            $this->projectModel->insert($data);

            session()->setFlashdata('msg', 'success');
            return redirect()->to('/project');
        } else {
            $validator = \Config\Services::validation();
            session()->setFlashdata('msg', 'error');
            return redirect()->to('/project/add')->withInput()->with('validator', $validator);
        }
    }

    public function detail($id)
    {
        if (session()->get('project_mode') == false) {
            return redirect()->to('/project');
        }

        $data = [
            'detail' => $this->clientModel->getDetail($id),
            'id' => $id
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
            'detail' => $this->clientModel->getDetail($id),
            'employee' => $this->employeeModel->getEmployeeNames(),
            'client' => $this->clientModel->getClientNames()
        ];

        return view('project/edit', $data);
    }

    public function saveEditProject($id)
    {
        $request = service('request');

        $rules = [
            'project_name' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Please input a project name',
                    'max_length' => 'The name should not be more than 50 characters'
                ]
            ],
            'project_manager' => 'required',
            'client_id' => 'required',
            'project_start' => 'required',
            'project_finish' => 'required',
            'project_status' => 'required',
            'contract_amount' => 'required'
        ];

        if ($this->validate($rules)) {
            $data = [
                'project_name' => $request->getVar('project_name'),
                'project_manager' => $request->getVar('project_manager'),
                'client_id' => intval($request->getVar('client_id')),
                'project_start' => $request->getVar('project_start'),
                'project_finish' => $request->getVar('project_finish'),
                'contract_amount' => $request->getVar('contract_amount'),
                'project_desc' => $request->getVar('project_desc'),
                'project_status' => $request->getVar('project_status')
            ];

            $this->projectModel->update($id, $data);

            session()->setFlashdata('msg', 'success');
            return redirect()->to('/project/detail/' . $id);
        } else {
            $validator = \Config\Services::validation();
            session()->setFlashdata('msg', 'error');
            return redirect()->to('/project/edit/' . $id)->withInput()->with('validator', $validator);
        }
    }

    public function delete()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->projectModel->where('id', $id)->delete();
        }
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

    public function team($id)
    {
        $data = [
            'id' => $id,
            'pm' => $this->projectModel->getPM($id),
            'employee' => $this->employeeModel->getEmployeeNames(),
            'position' => $this->positionModel->getPositionNames(),
            'members' => $this->pteamModel->getMembers($id)
        ];

        return view('/project/team', $data);
    }

    public function saveMemberData()
    {
        $request = service('request');

        if ($request->getVar('action')) {
            helper(['form', 'url']);
            $name_error = '';
            $position_error = '';
            $error = 'no';

            $rules = [
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please select a name'
                    ]
                ],
                'position' => 'required'
            ];

            $error = $this->validate($rules);

            if (!$error) {
                $error = 'yes';
                $validator = \Config\Services::validation();

                if ($validator->getError('name')) {
                    $name_error = $validator->getError('name');
                }

                if ($validator->getError('position')) {
                    $position_error = $validator->getError('position');
                }
            } else {
                if ($request->getVar('action') == 'create') {
                    $this->pteamModel->save([
                        'project_id' => intval($request->getVar('project_id')),
                        'employee_id' => intval($request->getVar('name')),
                        'position_id' => intval($request->getVar('position'))
                    ]);
                }

                if ($request->getVar('action') == 'edit') {
                    $id = $request->getVar('member_id');
                    $data = [
                        'employee_id' => intval($request->getVar('name')),
                        'position_id' => intval($request->getVar('position'))
                    ];

                    $this->pteamModel->update($id, $data);
                }
            }

            $output = [
                'name_error' => $name_error,
                'position_error' => $position_error,
                'error' => $error
            ];

            echo json_encode($output);
        }
    }

    public function fetchIdPteam()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $pteamID = $this->pteamModel
                ->select('pteam.id, employee_id, position_id')
                ->join('project', 'pteam.project_id = project.id')
                ->join('employee', 'pteam.employee_id = employee.id')
                ->join('position', 'pteam.position_id = position.id')
                ->where('pteam.id', $request->getVar('id'))->first();

            echo json_encode($pteamID);
        }
    }

    public function deleteTeamMember()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->pteamModel->where('id', $id)->delete();
        }
    }

    public function cost($id)
    {
        $data = [
            'id' => $id
        ];

        return view('/project/cost', $data);
    }
    public function transaction($id)
    {
        $data = [
            'id' => $id
        ];

        return view('/project/transaction', $data);
    }

    public function comment($id)
    {
        $data = [
            'id' => $id,
            'comment' => $this->commentModel->getComment($id)
        ];

        return view('/project/comment', $data);
    }

    public function fetchComment()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $commentID = $this->commentModel
                ->select('comment_text')
                ->where('id', $request->getVar('id'))->first();
            echo json_encode($commentID);
        }
    }

    public function saveComment()
    {
        $request = service('request');
        helper(['form', 'url']);
        $comment_error = '';
        $error = 'no';

        $rules = [
            'comment' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Please input your comment',
                    'max_length' => 'Your comment must be less than 255 characters'
                ]
            ],
        ];

        $error = $this->validate($rules);

        if (!$error) {
            $error = 'yes';
            $validator = \Config\Services::validation();
            $comment_error = $validator->getError('comment');
        } else {
            $this->commentModel->save([
                'project_id' => intval($request->getVar('project_id')),
                'user_id' => session()->get('user_id'),
                'comment_text' => $request->getVar('comment'),
                session()->setFlashdata('msg', 'success_create')
            ]);
        }

        $output = [
            'comment_error' => $comment_error,
            'error' => $error
        ];

        echo json_encode($output);
    }

    public function editComment()
    {
        $request = service('request');
        helper(['form', 'url']);
        $comment_error = '';
        $error = 'no';

        $rules = [
            'comment_edit' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Please input your comment',
                    'max_length' => 'Your comment must be less than 255 characters'
                ]
            ],

        ];

        $error = $this->validate($rules);

        if (!$error) {
            $error = 'yes';
            $validator = \Config\Services::validation();
            $comment_error = $validator->getError('comment_edit');
        } else {
            $this->commentModel->save([
                'id' => intval($request->getVar('comment_id')),
                'user_id' => session()->get('user_id'),
                'comment_text' => $request->getVar('comment_edit')
            ]);
            session()->setFlashdata('msg', 'success_edit');
        }

        $output = [
            'comment_error' => $comment_error,
            'error' => $error
        ];

        echo json_encode($output);
    }

    public function deleteComment()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->commentModel->where('id', $id)->delete();
        }
    }
}
