<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function login()
	{
		return view('pages/login');
	}
	public function dashboard()
	{
		return view('pages/dashboard');
	}
	public function project()
	{
		return view('pages/project');
	}
	public function user()
	{
		return view('pages/user');
	}
}
