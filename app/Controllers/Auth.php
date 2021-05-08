<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function authLogin()
    {
        $userModel = new UserModel();
        $request = service('request');

        $username = $request->getVar('username');
        $password = $request->getVar('password');

        $row = $userModel->getLogin($username);

        if ($row == NULL) {
            return redirect()->to('/auth/login')->withInput()->with('errlog', 'username');
        }
        if (password_verify($password, $row->password)) {
            $data = [
                'login' => TRUE,
                'user_id' => $row->id,
                'username' => $row->username,
                'role' => $row->role
            ];

            session()->set($data);
            session()->setFlashdata('message', 'welcome');
            return redirect()->to('/');
        }
        return redirect()->to('/auth/login')->withInput()->with('errlog', 'password');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
