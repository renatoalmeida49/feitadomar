<?php
class HomeController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$dados = array();
		$dados['local'] = 'inicio';

		$this->loadTemplate('home', $dados);
	}
}