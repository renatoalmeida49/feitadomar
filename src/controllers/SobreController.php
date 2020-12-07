<?php
class SobreController extends Controller {

	public function index() {
		$dados = array();
		$dados['local'] = 'sobre';
		$this->loadTemplate('sobre', $dados);
	}

}