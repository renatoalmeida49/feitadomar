<?php
class ProdutosController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$dados = array();
		$dados['local'] = 'produtos';

		$this->loadTemplate('produtos', $dados);
	}
}