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

	public function update($data)
	{
		$query = $this->db->prepare("UPDATE $this->table SET name = :name, color = :color WHERE id = :id");

		return $query->execute($data);
	}

	public function delete($id)
	{
		$query = $this->db->prepare("DELETE FROM $this->table WHERE id = :id");

		return $query->execute(["id" => $id]);
	}
}
