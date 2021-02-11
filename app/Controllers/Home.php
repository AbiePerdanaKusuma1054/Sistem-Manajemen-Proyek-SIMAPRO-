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

	public function fetchUserData()
	{
		// $table = new TablesIgniter();

		// $table->setTable($this->userModel->noticeTable())
		// 	->setDefaultOrder('id', 'DESC')
		// 	->setOrder(['username', 'role', null])
		// 	->setSearch(['username', 'role'])
		// 	->setOutput(['username', 'role', $this->userModel->button()]);
		// return $table->getDatatable();
	}
}
