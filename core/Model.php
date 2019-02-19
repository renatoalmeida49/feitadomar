<?php
class Model {
	protected $db;

	public function __construct() {
		global $config;

		try {
			$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
		} catch (PDOExcepetion $e) {
			echo "ERRO: ".$e->getMessage();
		}
	}
}