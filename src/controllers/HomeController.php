<?php
namespace src\controllers;

use core\Controller;

class HomeController extends Controller {

	public function index() {
		$dados = array();
		$dados['local'] = 'inicio';

		$this->render('home', $dados);
	}
}