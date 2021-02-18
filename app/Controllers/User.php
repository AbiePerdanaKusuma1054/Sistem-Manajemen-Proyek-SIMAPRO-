<?php

namespace App\Controllers;

use App\Models\UserModel;
use monken\TablesIgniter;

class User extends BaseController
{

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('user');
    }

    public function fetchUserData()
    {
        $table = new TablesIgniter();

        $table->setTable($this->userModel->noticeTable())
            ->setDefaultOrder('username', 'ASC')
            ->setOrder(['username', 'role', null])
            ->setSearch(['username', 'role'])
            ->setOutput(['username', 'role', $this->userModel->button()]);
        return $table->getDatatable();
    }

    public function saveUserData()
    {
        $request = service('request');

        if ($request->getVar('action')) {
            helper(['form', 'url']);
            $username_error = '';
            $password_error = '';
            $role_error = '';
            $error = 'no';

            if ($request->getVar('action') == 'create') {
                $rules = [
                    'username' => 'required|min_length[5]|max_length[10]|is_unique[user.username]',
                    'password' => 'required|min_length[6]',
                    'role' => 'required'
                ];
            }

            if ($request->getVar('action') == 'edit') {
                $rules = [
                    'username' => 'required|min_length[5]|max_length[10]',
                    'password' => 'required|min_length[6]',
                    'role' => 'required'
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
        $request = service('request');

        if ($request->getVar('id')) {
            $userID = $this->userModel->where('id', $request->getVar('id'))->first();
            echo json_encode($userID);
        }
    }

    public function deleteUser()
    {
        $request = service('request');

        if ($request->getVar('id')) {
            $id = $request->getVar('id');
            $this->userModel->where('id', $id)->delete();
        }
    }
}
