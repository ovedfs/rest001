<?php

namespace App\Core;

abstract class Controller
{
	public function model($model)
	{
		$class = "App\Models\\" . ucfirst($model);

		return new $class;
	}

	public function view($view, $data = [])
	{
		extract($data);
		require_once(VIEW_PATH . $view . ".php");
	}
}
