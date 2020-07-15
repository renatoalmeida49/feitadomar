<?php
class HomeController extends Controller {

	public function index() {
		$dados = array();
		$dados['local'] = 'inicio';

		$this->loadTemplate('home', $dados);
	}
}