<?php

namespace App\Models;

use PDO;

use App\Core\Model;

class Post extends Model
{
	protected $table = "posts";

	public function findbyvalue($value)
	{
		$sql = "SELECT * FROM $this->table WHERE title like '%$value%' OR description like '%$value%' ";
		$query = $this->db->prepare($sql);
		$query->bindParam(':$value', $value, PDO::PARAM_STR);
		$query->execute();
        
		return $query->fetchAll(PDO::FETCH_OBJ);	
	}
}
