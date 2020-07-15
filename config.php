<?php
require 'environment.php';

$config = array();

if (ENVIRONMENT == 'development') {
	define("BASE_URL", 'http://localhost/feitadomar/');
	$config['dbdriver'] = 'mysql';
	$config['dbname'] = 'feitadomar';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE_URL", 'https://meusite.com.br');
	$config['dbdriver'] = 'mysql';
	$config['dbname'] = 'estruturamvc';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}