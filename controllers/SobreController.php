<?php
class SobreController extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {
		$dados = array();
		$dados['local'] = 'sobre';
		$this->loadTemplate('sobre', $dados);
	}

}