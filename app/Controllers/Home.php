<?php

namespace App\Controllers;

use App\Models\ProjectModel;

class Home extends BaseController
{

	public function index()
	{
		$projectModel = new ProjectModel();
		$data = [
			'waiting' => $projectModel->where('project_status', 'waiting')->countAllResults(),
			'on_progress' => $projectModel->where('project_status', 'on progress')->countAllResults(),
			'hold' => $projectModel->where('project_status', 'hold')->countAllResults(),
			'finish' => $projectModel->where('project_status', 'finish')->countAllResults(),
			'cancelled' => $projectModel->where('project_status', 'cancelled')->countAllResults()
		];
		return view('home', $data);
	}
}
