<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $sessions = [
            'user_mode' => true,
            'employee_mode' => false,
            'position_mode' => false,
            'project_mode' => false,
            'dashboard_mode' => false,
            'client_mode' => false
        ];

        session()->set($sessions);

        if (session()->get('role') != 'admin') {
            return redirect()->to('/');
        }
        return view('user');
    }

    public function fetchUserData()
    {
        $this->table->setTable($this->userModel->noticeTable())
            ->setDefaultOrder('username', 'ASC')
            ->setOrder(['username', 'role', null])
            ->setSearch(['username', 'role'])
            ->setOutput(['username', 'role', $this->userModel->button()]);

        if (session()->get('role') != 'admin') {
            return redirect()->to('/');
        }

        return $this->table->getDatatable();
    }

    public function saveUserData()
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $request = service('request');

        if ($request->getVar('action')) {
            helper(['form', 'url']);
            $username_error = '';
            $password_error = '';
            $role_error = '';
            $error = 'no';

            if ($request->getVar('action') == 'create') {
                $rules = [
                    'username' => [
                        'rules' => 'required|min_length[5]|max_length[10]|is_unique[user.username]',
                        'errors' => [
                            'required' => 'Please input a name',
                            'min_length' => 'The name should not be less than 5 characters',
                            'max_length' => 'The name should not be more than 10 characters',
                            'is_unique' => 'The username is already used',
                        ]
                    ],
                    'password' => [
                        'rules' => 'required|min_length[6]',
                        'errors' => [
                            'required' => 'Please input a password',
                            'min_length' => 'The password should not be less than 6 characters'
                        ]
                    ],
                    'role' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Please choose a role'
                        ]
                    ]
                ];
            }

            if ($request->getVar('action') == 'edit') {
                $rules = [
                    'username' => [
                        'rules' => 'required|min_length[5]|max_length[10]',
                        'errors' => [
                            'required' => 'Please input a name',
                            'min_length' => 'The name should not be less than 5 characters',
                            'max_length' => 'The name should not be more than 10 characters'
                        ]
                    ],
                    'password' => [
                        'rules' => 'required|min_length[6]',
                        'errors' => [
                            'required' => 'Please input a password',
                            'min_length' => 'The password should not be less than 6 characters'
                        ]
                    ],
                    'role' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Please choose a role'
                        ]
                    ]
                ];
            }

            $error = $this->validate($rules);

            if (!$error) {
                $error = 'yes';
                $validator = \Config\Services::validation();

                if ($validator->getError('username')) {
                    $username_error = $validator->getError('username');
                }

                if ($validator->getError('password')) {
                    $password_error = $validator->getError('password');
                }

                if ($validator->getError('role')) {
                    $role_error = $validator->getError('role');
                }
            } else {
                if ($request->getVar('action') == 'create') {
                    $this->userModel->save([
                        'username' => $request->getVar('username'),
                        'password' => $request->getVar('password'),
                        'role' => $request->getVar('role')
                    ]);
                }

                if ($request->getVar('action') == 'edit') {
                    $id = $request->getVar('hidden_id');
                    $data = [
                        'username' => $request->getVar('username'),
                        'password' => $request->getVar('password'),
                        'role' => $request->getVar('role'),
                    ];

                    $this->userModel->update($id, $data);
                }
            }

            $output = [
                'username_error' => $username_error,
                'password_error' => $password_error,
                'role_error' => $role_error,
                'error' => $error
            ];

            echo json_encode($output);
        }
    }

    public function fetchIdUser()
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $request = service('request');

        if ($request->getVar('id')) {
            $userID = $this->userModel->where('id', $request->getVar('id'))->first();
            echo json_encode($userID);
        }
    }

    public function deleteUser()
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/');
        }

        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->userModel->where('id', $id)->delete();
        }
    }
}
