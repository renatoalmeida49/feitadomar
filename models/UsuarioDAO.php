<?php
class UsuarioDAO extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function login(Usuario $usuario) {
		$login = $usuario->getLogin();
		$senha = $usuario->getSenha();

		$sql = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':login', $login);
		$stmt->bindValue(':senha', md5($senha));

		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$usuario = $stmt->fetch();
			$_SESSION['usuarioId'] = $usuario['id'];
			$_SESSION['usuarioNome'] = $usuario['nome'];
			$_SESSION['usuarioLogin'] = $usuario['login'];
			$_SESSION['usuarioTipo'] = $usuario['tipo'];
			return true;
		} else {
			return false;
		}
	}

	public function insert(Usuario $usuario) {
		$nome = $usuario->getNome();
		$login = $usuario->getLogin();
		$senha = $usuario->getSenha();

		$sql = "SELECT id FROM usuarios WHERE login = ?";
		$stmt = $this->db->prepare($sql);
		$stmt->bindParam(1, $login);
		$stmt->execute();

		if ($stmt->rowCount() == 0) {
			$sql = "INSERT INTO usuarios (nome, login, senha) VALUES (:nome, :login, :senha)";
		
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(':nome', $nome);
			$stmt->bindValue(':login', $login);
			$stmt->bindValue('senha', md5($senha));

			$stmt->execute();

			return true;
		} else {
			return false;
		}


		
	}
}