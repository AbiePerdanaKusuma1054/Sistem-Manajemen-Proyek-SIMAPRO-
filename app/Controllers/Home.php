<?php

namespace App\Controllers;

use App\Models\UserModel;
use monken\TablesIgniter;

class Home extends BaseController
{

	public function __construct()
	{
		$this->userModel = new UserModel();
	}

	public function dashboard()
	{
		return view('home/dashboard');
	}

	public function project()
	{
		return view('home/project');
	}

	public function user()
	{
		return view('home/user');
	}

	public function saveUserData()
	{
		$request = service('request');

		if ($request->getVar('action')) {
			helper(['form', 'url']);
			$username_error = '';
			$password_error = '';
			$error = 'no';
			$success = 'no';
			$rules = [
				'username' => 'required|min_length[5]',
				'password' => 'required|min_length[6]'
			];

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
			} else {
				$success = 'yes';
				if ($request->getVar('action') == 'Create') {
					$this->userModel->save([
						'username' => $request->getVar('username'),
						'password' => $request->getVar('password'),
						'role' => $request->getVar('role')
					]);
				}
			}

			$output = [
				'username_error' => $username_error,
				'password_error' => $password_error,
				'error' => $error,
				'success' => $success
			];

			echo json_encode($output);
		}
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

	public function addproject()
	{
		return view('home/addproject');
	}

	public function detailproject()
	{
		return view('home/detailproject');
	}

	public function editproject()
	{
		return view('home/editproject');
	}

	public function fetchProjectData()
	{
		//
	}
}
