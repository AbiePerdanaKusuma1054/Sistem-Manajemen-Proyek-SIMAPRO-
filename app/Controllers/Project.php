<?php

namespace App\Controllers;

use App\Models\ProjectModel;
use App\Models\ClientModel;
use App\Models\EmployeeModel;
use App\Models\PositionModel;
use App\Models\PteamModel;
use App\Models\CommentModel;
use App\Models\CostCategoryModel;
use App\Models\PcostModel;
use App\Models\PcostTransactionModel;
use App\Models\PrevenuesModel;

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
        $this->costModel = new CostCategoryModel();
        $this->pcostModel = new PcostModel();
        $this->prevenuesModel = new PrevenuesModel();
        $this->pcostTransactionModel = new PcostTransactionModel();
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

    //Projects and it's details

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
            'contract_amount' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required' => 'Please input the amount.',
                    'max_length' => 'The amount should not be more than 10 numbers.'
                ]
            ]
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
                'project_status' => 'waiting',
                'project_progress' => 0
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
            'project_progress' => [
                'rules' => 'required|max_length[3]|integer',
                'errors' => [
                    'required' => 'Please input the amount.',
                    'max_length' => 'Input should not be more than 3 numbers.',
                    'integer' => 'Input must be a number.'
                ]
            ],
            'contract_amount' => [
                'rules' => 'required|max_length[10]',
                'errors' => [
                    'required' => 'Please input the amount.',
                    'max_length' => 'The amount should not be more than 10 numbers.'
                ]
            ],
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
                'project_status' => $request->getVar('project_status'),
                'project_progress' => $request->getVar('project_progress')
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
        $this->table->setTable($this->projectModel->noticeTable())
            ->setDefaultOrder('project_name', 'ASC')
            ->setOrder([
                'project_name', 'client_name', 'project_manager',
                'project_start', 'project_finish', 'project_status', null
            ])
            ->setSearch(['project_name', 'client_name', 'project_manager', 'project_status'])
            ->setOutput([
                'project_name', 'client_name', 'project_manager', $this->projectModel->startDate(),
                $this->projectModel->finishDate(), $this->projectModel->progress(),
                $this->projectModel->status(), $this->projectModel->button()
            ]);
        return $this->table->getDatatable();
    }

    //Project's team and it's members

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
                    session()->setFlashdata('msg', 'create');
                }

                if ($request->getVar('action') == 'edit') {
                    $id = $request->getVar('member_id');
                    $data = [
                        'employee_id' => intval($request->getVar('name')),
                        'position_id' => intval($request->getVar('position'))
                    ];

                    $this->pteamModel->update($id, $data);
                    session()->setFlashdata('msg', 'edit');
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
            session()->setFlashdata('msg', 'delete');
        }
    }

    //Costs (Pcost)

    public function cost($id)
    {
        $data = [
            'category' => $this->costModel->getCategories($id),
            'costs' => $this->pcostModel,
            'id' => $id
        ];

        return view('/project/cost', $data);
    }

    //Cost Categories

    public function saveCostCat()
    {
        $request = service('request');

        if ($request->getVar('action_costcat')) {
            helper(['form', 'url']);
            $name_error = '';
            $error = 'no';

            $rules = [
                'name' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Please input the category name',
                        'max_length' => 'The name must be less than 50 characters'
                    ]
                ],
            ];

            $error = $this->validate($rules);

            if (!$error) {
                $error = 'yes';
                $validator = \Config\Services::validation();
                $name_error = $validator->getError('name');
            } else {

                if ($request->getVar('action_costcat') == 'add') {
                    $this->costModel->save([
                        'project_id' => intval($request->getVar('project_id')),
                        'category_name' => $request->getVar('name')
                    ]);
                    session()->setFlashdata('msg', 'create');
                }

                if ($request->getVar('action_costcat') == 'edit') {
                    $id = $request->getVar('cat_id');
                    $data = [
                        'category_name' => $request->getVar('name')
                    ];

                    $this->costModel->update($id, $data);
                    session()->setFlashdata('msg', 'edit');
                }
            }
            $output = [
                'name_error' => $name_error,
                'error' => $error
            ];

            echo json_encode($output);
        }
    }

    public function fetchIdCategory()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $categoryID = $this->costModel->select('category_name')
                ->where('id', $request->getVar('id'))->first();

            echo json_encode($categoryID);
        }
    }

    public function deleteCostCat()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->costModel->where('id', $id)->delete();
            session()->setFlashdata('msg', 'delete');
        }
    }

    //Project Cost's Details

    public function saveCostData()
    {
        $request = service('request');
        if ($request->getVar('action_cost')) {
            helper(['form', 'url']);
            $desc_error = '';
            $amount_error = '';
            $quantity_error = '';
            $unitQuantity_error = '';
            $duration_error = '';
            $unitDuration_error = '';
            $error = 'no';

            $rules = [
                'desc' => [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => 'Please describe the cost',
                        'max_length' => 'The description must be less than 255 characters'
                    ]
                ],
                'amount' => [
                    'rules' => 'required|integer|max_length[10]',
                    'errors' => [
                        'required' => 'Please input the amount of cost',
                        'integer' => 'The amount must be a number',
                        'max_length' => 'The amount should not be more than 10 numbers'
                    ]
                ],
                'quantity' => [
                    'rules' => 'required|integer|max_length[10]',
                    'errors' => [
                        'required' => 'Please input the quantity of cost',
                        'integer' => 'The quantity must be a number',
                        'max_length' => 'The quantity should not be more than 10 numbers'
                    ]
                ],
                'unitQuantity' => [
                    'rules' => 'required|alpha_space|max_length[10]',
                    'errors' => [
                        'required' => 'Please input the unit of quantity',
                        'alpha_space' => 'The unit of quantity should not be a number',
                        'max_length' => 'The unit of quantity should not be more than 10 characters'
                    ]
                ],
                'duration' => [
                    'rules' => 'required|integer|max_length[10]',
                    'errors' => [
                        'required' => 'Please input the duration of cost',
                        'integer' => 'The duration must be a number',
                        'max_length' => 'The duration should not be more than 10 numbers'
                    ]
                ],
                'unitDuration' => [
                    'rules' => 'required|alpha_space|max_length[10]',
                    'errors' => [
                        'required' => 'Please input the unit of duration',
                        'alpha_space' => 'The unit of duration should not be a number',
                        'max_length' => 'The unit of duration should not be more than 10 characters'
                    ]
                ],
            ];

            $error = $this->validate($rules);

            if (!$error) {
                $error = 'yes';
                $validator = \Config\Services::validation();
                if ($validator->getError('desc')) {
                    $desc_error = $validator->getError('desc');
                }

                if ($validator->getError('amount')) {
                    $amount_error = $validator->getError('amount');
                }

                if ($validator->getError('quantity')) {
                    $quantity_error = $validator->getError('quantity');
                }
                if ($validator->getError('unitQuantity')) {
                    $unitQuantity_error = $validator->getError('unitQuantity');
                }
                if ($validator->getError('duration')) {
                    $duration_error = $validator->getError('duration');
                }
                if ($validator->getError('unitDuration')) {
                    $unitDuration_error = $validator->getError('unitDuration');
                }
            } else {

                if ($request->getVar('action_cost') == 'add') {
                    $this->pcostModel->save([
                        'category_id' => intval($request->getVar('category_id')),
                        'pcost_desc' => $request->getVar('desc'),
                        'pcost_amount' => $request->getVar('amount'),
                        'pcost_quantity' => $request->getVar('quantity'),
                        'pcost_unit' => $request->getVar('unitQuantity'),
                        'pcost_duration' => $request->getVar('duration'),
                        'pcost_unit_duration' => $request->getVar('unitDuration'),
                    ]);
                    session()->setFlashdata('msg', 'create_cost');
                } else {
                    $id = $request->getVar('cost_id');
                    $data = [
                        'pcost_desc' => $request->getVar('desc'),
                        'pcost_amount' => $request->getVar('amount'),
                        'pcost_quantity' => $request->getVar('quantity'),
                        'pcost_unit' => $request->getVar('unitQuantity'),
                        'pcost_duration' => $request->getVar('duration'),
                        'pcost_unit_duration' => $request->getVar('unitDuration')
                    ];

                    $this->pcostModel->update($id, $data);
                    session()->setFlashdata('msg', 'edit_cost');
                }
            }

            $output = [
                'desc_error' => $desc_error,
                'amount_error' => $amount_error,
                'quantity_error' => $quantity_error,
                'unitQuantity_error' => $unitQuantity_error,
                'duration_error' => $duration_error,
                'unitDuration_error' => $unitDuration_error,
                'error' => $error
            ];

            echo json_encode($output);
        }
    }

    public function fetchIdCost()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $costID = $this->pcostModel->where('id', $request->getVar('id'))->first();
            echo json_encode($costID);
        }
    }

    public function deleteCost()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->pcostModel->where('id', $id)->delete();
            session()->setFlashdata('msg', 'delete_cost');
        }
    }

    // public function fetchCostsData($id)
    // {
    //     $table = new TablesIgniter();

    //     $table->setTable($this->pcostModel->noticeTable($id))
    //         ->setDefaultOrder('pcost_desc', 'ASC')
    //         ->setOrder([
    //             'pcost_desc', 'pcost_amount', 'pcost_quantity',
    //             'pcost_unit', 'pcost_duration', 'pcost_unit_duration', NULL
    //         ])
    //         ->setSearch(['pcost_desc'])
    //         ->setOutput([
    //             'pcost_desc', 'pcost_amount', 'pcost_quantity',
    //             'pcost_unit', 'pcost_duration', 'pcost_unit_duration', $this->pcostModel->button()
    //         ]);
    //     return $table->getDatatable();
    // }

    public function transaction($id)
    {
        $data = [
            'id' => $id,
            'revenues_sum' => $this->prevenuesModel->rvsum($id),
            'transaction_sum' => $this->pcostTransactionModel->trsum($id),
            'desc' => $this->pcostModel->getDescription($id)
        ];

        return view('/project/transaction', $data);
    }

    // Income/Revenues

    public function fetchRevenues($id)
    {
        $this->table->setTable($this->prevenuesModel->noticeTable($id))
            ->setDefaultOrder('prevenues_desc', 'ASC')
            ->setOrder([
                null, 'prevenues_desc', 'prevenues_status',
                'prevenues_amount', 'prevenues_date'
            ])
            ->setOutput([
                $this->prevenuesModel->button(), $this->prevenuesModel->date(), 'prevenues_desc',
                $this->prevenuesModel->status(), 'prevenues_amount'
            ]);
        return $this->table->getDatatable();
    }

    public function saveIncome()
    {
        $request = service('request');

        if ($request->getVar('action_income')) {
            helper(['form', 'url']);
            $date_error = '';
            $desc_error = '';
            $amount_error = '';
            $status_error = '';
            $error = 'no';

            $rules = [
                'desc' => [
                    'rules' => 'required|max_length[255]',
                    'errors' => [
                        'required' => 'Please describe the income',
                        'max_length' => 'The amount should be less than 255 character'
                    ]
                ],
                'date' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input the date'
                    ]
                ],
                'amount' => [
                    'rules' => 'required|max_length[10]',
                    'errors' => [
                        'required' => 'Please input the amount',
                        'max_length' => 'The amount should be less than 10 character'
                    ]
                ],
                'status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input the status'
                    ]
                ]
            ];

            $error = $this->validate($rules);

            if (!$error) {
                $error = 'yes';
                $validator = \Config\Services::validation();

                if ($validator->getError('amount')) {
                    $amount_error = $validator->getError('amount');
                }

                if ($validator->getError('desc')) {
                    $desc_error = $validator->getError('desc');
                }
                if ($validator->getError('date')) {
                    $date_error = $validator->getError('date');
                }
                if ($validator->getError('status')) {
                    $status_error = $validator->getError('status');
                }
            } else {
                if ($request->getVar('action_income') == 'create') {
                    $this->prevenuesModel->save([
                        'project_id' => intval($request->getVar('project_id')),
                        'prevenues_date' => $request->getVar('date'),
                        'prevenues_desc' => $request->getVar('desc'),
                        'prevenues_amount' => $request->getVar('amount'),
                        'prevenues_status' => $request->getVar('status')
                    ]);
                }

                if ($request->getVar('action_income') == 'edit') {
                    $id = $request->getVar('income_id');
                    $data = [
                        'prevenues_date' => $request->getVar('date'),
                        'prevenues_desc' => $request->getVar('desc'),
                        'prevenues_amount' => $request->getVar('amount'),
                        'prevenues_status' => $request->getVar('status')
                    ];

                    $this->prevenuesModel->update($id, $data);
                }
            }

            $output = [
                'date_error' => $date_error,
                'desc_error' => $desc_error,
                'amount_error' => $amount_error,
                'status_error' => $status_error,
                'error' => $error
            ];

            echo json_encode($output);
        }
    }

    public function fetchIdIncome()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $prevenuesID = $this->prevenuesModel->where('id', $request->getVar('id'))->first();
            echo json_encode($prevenuesID);
        }
    }

    public function deleteIncome()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->prevenuesModel->where('id', $id)->delete();
        }
    }

    // Outcome (Pcost transactions)

    public function fetchOutcome($id)
    {
        $this->table->setTable($this->pcostTransactionModel->noticeTable($id))
            ->setDefaultOrder('pcost_desc', 'ASC')
            ->setOrder([
                null, 'cost_date', 'pcost_desc', 'cost_item',
                'cost_status', 'cost_amount'
            ])
            ->setOutput([
                $this->pcostTransactionModel->button(), $this->pcostTransactionModel->date(), 'pcost_desc', 'cost_item',
                $this->pcostTransactionModel->status(), 'cost_amount'
            ]);
        return $this->table->getDatatable();
    }

    public function fetchIdOutcome()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $pcostTransactionID = $this->pcostTransactionModel
                ->select('cost_date, pcost.id, cost_amount, cost_item, cost_status')
                ->join('pcost', 'pcost_transaction.pcost_id = pcost.id')
                ->join('cost_category', 'pcost.category_id = cost_category.id')
                ->where('pcost_transaction.id', $request->getVar('id'))->first();
            echo json_encode($pcostTransactionID);
        }
    }

    public function saveOutcome()
    {
        $request = service('request');

        if ($request->getVar('action_outcome')) {
            helper(['form', 'url']);
            $outcome_date_error = '';
            $cost_desc_error = '';
            $cost_item_error = '';
            $outcome_amount_error = '';
            $outcome_status_error = '';
            $error = 'no';

            $rules = [
                'cost_desc' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input the cost description'
                    ]
                ],
                'cost_item' => [
                    'rules' => 'required|max_length[50]',
                    'errors' => [
                        'required' => 'Please input the item',
                        'max_length' => 'The amount should be less than 50 character'
                    ]
                ],
                'outcome_date' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input the date'
                    ]
                ],
                'outcome_amount' => [
                    'rules' => 'required|max_length[10]',
                    'errors' => [
                        'required' => 'Please describe the income',
                        'max_length' => 'The amount should be less than 10 character'
                    ]
                ],
                'outcome_status' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Please input the status'
                    ]
                ]
            ];

            $error = $this->validate($rules);

            if (!$error) {
                $error = 'yes';
                $validator = \Config\Services::validation();

                if ($validator->getError('outcome_amount')) {
                    $outcome_amount_error = $validator->getError('outcome_amount');
                }
                if ($validator->getError('cost_desc')) {
                    $cost_desc_error = $validator->getError('cost_desc');
                }
                if ($validator->getError('cost_item')) {
                    $cost_item_error = $validator->getError('cost_item');
                }
                if ($validator->getError('outcome_date')) {
                    $outcome_date_error = $validator->getError('outcome_date');
                }
                if ($validator->getError('outcome_status')) {
                    $outcome_status_error = $validator->getError('outcome_status');
                }
            } else {
                if ($request->getVar('action_outcome') == 'create') {
                    $this->pcostTransactionModel->save([
                        'pcost_id' => intval($request->getVar('cost_desc')),
                        'cost_item' => $request->getVar('cost_item'),
                        'cost_amount' => $request->getVar('outcome_amount'),
                        'cost_status' => $request->getVar('outcome_status'),
                        'cost_date' => $request->getVar('outcome_date'),
                    ]);
                }

                if ($request->getVar('action_outcome') == 'edit') {
                    $id = $request->getVar('outcome_id');
                    $data = [
                        'pcost_id' => intval($request->getVar('cost_desc')),
                        'cost_item' => $request->getVar('cost_item'),
                        'cost_amount' => $request->getVar('outcome_amount'),
                        'cost_status' => $request->getVar('outcome_status'),
                        'cost_date' => $request->getVar('outcome_date'),
                    ];

                    $this->pcostTransactionModel->update($id, $data);
                }
            }

            $output = [
                'outcome_date_error' => $outcome_date_error,
                'cost_desc_error' => $cost_desc_error,
                'cost_item_error' => $cost_item_error,
                'outcome_amount_error' => $outcome_amount_error,
                'outcome_status_error' => $outcome_status_error,
                'error' => $error
            ];

            echo json_encode($output);
        }
    }

    public function deleteOutcome()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->pcostTransactionModel->where('id', $id)->delete();
        }
    }

    // Project's comments

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
