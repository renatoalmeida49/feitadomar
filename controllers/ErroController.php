<?php
class ErroController extends Controller {
	public function index() {
		$dados = array();

		$dados['local'] = 'inicio';

		$this->loadTemplate('404', $dados);
	}
}