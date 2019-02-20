<?php
class LoginController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$dados = array();
		$dados['local'] = 'login';

		if (isset($_POST['login']) && isset($_POST['senha'])) {
			$usuario = new Usuario();
			$dao = new UsuarioDAO();

			$usuario->setLogin(addslashes($_POST['login']));
			$usuario->setSenha($_POST['senha']);

			if($dao->login($usuario)) {
				header("Location: ".BASE_URL);
			} else {
				$dados['msg'] = '
				<div class="alert alert-danger">
					Usuário e/ou senha errados!
				</div>';
			}
		}

		$this->loadTemplate('login', $dados);
	}

	public function cadastrar() {
		$dados = array();
		$usuario = new Usuario();
		$dao = new UsuarioDAO();
		$dados['local'] = 'cadastre';

		if (isset($_POST['login']) && !empty($_POST['nome'])) {
			$usuario->setNome(addslashes($_POST['nome']));
			$usuario->setLogin(addslashes($_POST['login']));
			$usuario->setSenha($_POST['senha']);

			if ($dao->insert($usuario)) {
				header("Location: ".BASE_URL."login");
			} else {
				$dados['msg'] = '
					<div class="alert alert-warning">
						Este usuário já está cadastrado. <a href="login.php" class="alert-link">Faça o login agora</a>
					</div>';
			}
		}

		$this->loadTemplate('cadastrar', $dados);
	}

	public function sair() {
		session_start();
		unset($_SESSION['usuarioId']);
		unset($_SESSION['usuarioTipo']);
		unset($_SESSION['usuarioNome']);
		header("Location: ".BASE_URL);
	}
}