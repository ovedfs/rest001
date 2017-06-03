<?php

namespace App\Controllers;

use App\Core\Controller;

class ErrorController extends Controller
{
	public function index()
	{
		$data["message"] = "¡Ups: La página que buscas no existe!";
		$data["main_view"] = "error/index";

		$this->view("layout", $data);
	}
}
