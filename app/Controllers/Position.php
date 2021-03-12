<?php

namespace App\Controllers;

use App\Models\PositionModel;

class Position extends BaseController
{

    public function __construct()
    {
        $this->positionModel = new PositionModel();
    }

    public function index()
    {
        $sessions = [
            'position_mode' => true,
            'employee_mode' => false,
            'client_mode' => false,
            'project_mode' => false,
            'dashboard_mode' => false,
            'user_mode' => false
        ];

        session()->set($sessions);
        return view('position');
    }

    public function fetchPositionData()
    {
        $this->table->setTable($this->positionModel->noticeTable())
            ->setDefaultOrder('position_name', 'ASC')
            ->setOrder(['position_name', 'position_desc', null, null])
            ->setSearch(['position_name'])
            ->setOutput(['position_name', 'position_desc', $this->positionModel->button()]);
        return $this->table->getDatatable();
    }

    public function savePositionData()
    {
        $request = service('request');

        if ($request->getVar('action')) {
            helper(['form', 'url']);
            $name_error = '';
            $error = 'no';

            if ($request->getVar('action') == 'create') {
                $rules = [
                    'name' => [
                        'rules' => 'required|is_unique[position.position_name]|max_length[50]',
                        'errors' => [
                            'required' => 'Please input a name',
                            'is_unique' => 'This position is already available',
                            'max_length' => 'The name should not be more than 50 characters'
                        ]
                    ],
                ];
            }

            if ($request->getVar('action') == 'edit') {
                $rules = [
                    'name' => [
                        'rules' => 'required|max_length[50]',
                        'errors' => [
                            'required' => 'Please input a name',
                            'max_length' => 'The name should not be more than 50 characters'
                        ]
                    ]
                ];
            }



            $error = $this->validate($rules);

            if (!$error) {
                $error = 'yes';
                $validator = \Config\Services::validation();

                if ($validator->getError('name')) {
                    $name_error = $validator->getError('name');
                }
            } else {
                if ($request->getVar('action') == 'create') {
                    $this->positionModel->save([
                        'position_name' => $request->getVar('name'),
                        'position_desc' => $request->getVar('position_desc')
                    ]);
                }

                if ($request->getVar('action') == 'edit') {
                    $id = $request->getVar('hidden_id');
                    $data = [
                        'position_name' => $request->getVar('name'),
                        'position_desc' => $request->getVar('position_desc')
                    ];

                    $this->positionModel->update($id, $data);
                }
            }

            $output = [
                'name_error' => $name_error,
                'error' => $error
            ];

            echo json_encode($output);
        }
    }

    public function fetchIdPosition()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $positionID = $this->positionModel->where('id', $request->getVar('id'))->first();
            echo json_encode($positionID);
        }
    }

    public function deletePosition()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->positionModel->where('id', $id)->delete();
        }
    }
}
