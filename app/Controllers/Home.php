<?php

namespace App\Controllers;

class Home extends BaseController
{
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
}
