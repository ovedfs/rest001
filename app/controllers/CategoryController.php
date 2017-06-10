<?php

namespace App\Controllers;

use App\Core\Controller;

class CategoryController extends Controller
{
	protected $categoryModel;

	public function __construct()
	{
		$this->categoryModel = $this->model("category");
	}

	public function get($id = 0)
	{
		if($id == 0) $data = $this->categoryModel->findAll();
		else $data = $this->categoryModel->find($id);

		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function post()
	{
		$insert_id = $this->categoryModel->insert($_POST);

		if($insert_id){
			$category = $this->categoryModel->find($insert_id);

			header('Content-Type: application/json');
			echo json_encode($category);
		}else{
			header('Content-Type: application/json');
			echo json_encode(["error" => "Bad Request"]);
		}
	}

	public function put($id = 0)
	{
		$put = file_get_contents('php://input');
		$data = array();

		parse_str($put, $data);

		$data["id"] = (int)$id;

		$update = $this->categoryModel->update($data);

		if($update){
			header('Content-Type: application/json');
			echo json_encode(["Update" => "Ok"]);
		}else{
			header('Content-Type: application/json');
			echo json_encode(["error" => "Failure"]);
		}
	}

	public function delete($id = 0)
	{
		$delete = $this->categoryModel->delete($id);

		if($delete){
			header('Content-Type: application/json');
			echo json_encode(["Delete" => "Ok"]);
		}else{
			header('Content-Type: application/json');
			echo json_encode(["error" => "Failure"]);
		}
	}

}
