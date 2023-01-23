<?php
namespace DB;

use mysqli;

class Connection {
	private function readConfig(){
		$config = file_get_contents("../config/db_config.json");
		$config = json_decode($config, true);

		return $config;
	}

	public function connect(){
		$config = $this->readConfig();
		$mysqli = new mysqli(
										$config['host'],
										$config['username'],
										$config['password'],
										$config['db_name']
									);
		if($mysqli->connect_errno){
			echo 'failed to connect because'.$mysqli->connect_errno;
		}

		return $mysqli;
	}

}
?>