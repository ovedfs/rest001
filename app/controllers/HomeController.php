<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
	protected $postModel;

	public function __construct()
	{
		$this->postModel = $this->model("post");
	}

	public function index()
	{
		$data["posts"] = $this->postModel->findAll();

		$data["main_view"] = "home/index";
		
		$this->view("layout", $data);
		// var_dump($data['posts']);
	}

	public function search()
	{
		$searchvalue = $_POST['valuetosearch'];

		$datos = $this->postModel->findbyvalue($searchvalue);

		//print_r($datos);
		echo json_encode($datos);
	}

}
