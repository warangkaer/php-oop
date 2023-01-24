<?php
namespace DB;

use DB\Connection;
use Exception;

require 'Connection.php';

class Query{

	public static function all($table){
		$con = new Connection();
		$result = $con->connect()->query("SELECT * FROM ".$table);
		if(!$result){
			return throw new Exception('Something went wrong');
		}
		$row = $result->fetch_assoc();
		
		$result->free_result();
		$con->connect()->close();

		return $row;
	}

	public function select($col, $table){
		$con = new Connection();
		$result = $con->connect()->query("SELECT ".$col." FROM ".$table);
		if(!$result){
			return throw new Exception('Something went wrong');
		}
		$row = $result->fetch_assoc();

		$result->free_result();
		$con->connect()->close();

		return $row;
	}

	public function delete($id, $table){
		$con = new Connection();
		$result = $con->connect()->query("DELETE FROM ".$table." WHERE id=".$id);
		
		
	}
}
?>