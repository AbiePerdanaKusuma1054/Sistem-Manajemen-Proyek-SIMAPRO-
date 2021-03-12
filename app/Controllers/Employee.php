<?php

namespace App\Controllers;

use App\Models\EmployeeModel;

class Employee extends BaseController
{

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    public function index()
    {
        $sessions = [
            'employee_mode' => true,
            'position_mode' => false,
            'client_mode' => false,
            'project_mode' => false,
            'dashboard_mode' => false,
            'user_mode' => false
        ];

        session()->set($sessions);
        return view('employee');
    }

    public function fetchEmployeeData()
    {
        $this->table->setTable($this->employeeModel->noticeTable())
            ->setDefaultOrder('employee_name', 'ASC')
            ->setOrder(['employee_name', 'employee_gender', 'employee_email', null, null])
            ->setSearch(['employee_name', 'employee_gender', 'employee_email', 'employee_address'])
            ->setOutput(['employee_name', 'employee_gender', 'employee_email', 'employee_address', $this->employeeModel->button()]);
        return $this->table->getDatatable();
    }

    public function saveEmployeeData()
    {
        $request = service('request');

        if ($request->getVar('action')) {
            helper(['form', 'url']);
            $name_error = '';
            $email_error = '';
            $gender_error = '';
            $address_error = '';
            $error = 'no';

            if ($request->getVar('action') == 'create') {
                $rules = [
                    'name' => [
                        'rules' => 'required|is_unique[employee.employee_name]|max_length[50]',
                        'errors' => [
                            'required' => 'Please input a valid employee name',
                            'max_length' => 'The name should not be more than 50 characters'
                        ]
                    ],
                    'email' => [
                        'rules' => 'required|valid_email|is_unique[employee.employee_email]|max_length[50]',
                        'errors' => [
                            'required' => 'Please input the email',
                            'max_length' => 'The email should not be more than 50 characters',
                            'is_unique' => 'The email is already used',
                            'valid_email' => 'The email is invalid',
                        ]
                    ],
                    'gender' => 'required',
                    'address' => 'required|max_length[255]'
                ];
            }

            if ($request->getVar('action') == 'edit') {
                $rules = [
                    'name' => [
                        'rules' => 'required|max_length[50]',
                        'errors' => [
                            'required' => 'Please input a valid employee name',
                            'max_length' => 'The name should not be more than 50 characters'
                        ]
                    ],
                    'email' => [
                        'rules' => 'required|valid_email|max_length[50]',
                        'errors' => [
                            'required' => 'Please input the email',
                            'max_length' => 'The email should not be more than 50 characters',
                            'valid_email' => 'The email is invalid',
                        ]
                    ],
                    'gender' => 'required',
                    'address' => 'required|max_length[255]'
                ];
            }



            $error = $this->validate($rules);

            if (!$error) {
                $error = 'yes';
                $validator = \Config\Services::validation();

                if ($validator->getError('name')) {
                    $name_error = $validator->getError('name');
                }

                if ($validator->getError('email')) {
                    $email_error = $validator->getError('email');
                }

                if ($validator->getError('gender')) {
                    $gender_error = $validator->getError('gender');
                }

                if ($validator->getError('address')) {
                    $address_error = $validator->getError('address');
                }
            } else {
                if ($request->getVar('action') == 'create') {
                    $this->employeeModel->save([
                        'employee_name' => $request->getVar('name'),
                        'employee_email' => $request->getVar('email'),
                        'employee_gender' => $request->getVar('gender'),
                        'employee_address' => $request->getVar('address')
                    ]);
                }

                if ($request->getVar('action') == 'edit') {
                    $id = $request->getVar('hidden_id');
                    $data = [
                        'employee_name' => $request->getVar('name'),
                        'employee_email' => $request->getVar('email'),
                        'employee_gender' => $request->getVar('gender'),
                        'employee_address' => $request->getVar('address')
                    ];

                    $this->employeeModel->update($id, $data);
                }
            }

            $output = [
                'name_error' => $name_error,
                'email_error' => $email_error,
                'gender_error' => $gender_error,
                'address_error' => $address_error,
                'error' => $error
            ];

            echo json_encode($output);
        }
    }

    public function fetchIdEmployee()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $employeeID = $this->employeeModel->where('id', $request->getVar('id'))->first();
            echo json_encode($employeeID);
        }
    }

    public function deleteEmployee()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->employeeModel->where('id', $id)->delete();
        }
    }
}
