<?php
class LoginController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$dados = array();
		$dados['local'] = 'login';
		$this->loadTemplate('login', $dados);
	}

	public function cadastrar() {
		$dados = array();
		$dados['local'] = 'cadastre';
		$this->loadTemplate('cadastrar', $dados);
	}
}