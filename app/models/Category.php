<?php

namespace App\Models;

use PDO;

use App\Core\Model;

class Category extends Model
{
	protected $table = "categories";

	public function insert($data)
	{
		$query = $this->db->prepare("INSERT INTO $this->table(name,color) VALUES(:name, :color)");

		if($query->execute($data)) return $this->db->lastInsertId();

		return false;
	}
}
