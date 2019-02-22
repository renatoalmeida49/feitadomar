<?php
class ContatoController extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {
		$dados = array();
		$dados['local'] = 'contato';
		$this->loadTemplate('contato', $dados);

		//Tratamento do formulário de perguntas
	}

}