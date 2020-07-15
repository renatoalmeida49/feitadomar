<?php
class Database {
	private static $pdo;

	public static function getInstance() {
		if (!isset($pdo)) {
			global $config;

			try {
				$pdo = new PDO($config['dbdriver'].":dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);

				return $pdo;
			} catch (PDOException $e) {
				echo "ERRO: ".$e->getMessage();
				exit;
			}
		}
	}

	private function __construct() {}
}