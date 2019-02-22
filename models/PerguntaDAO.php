<?php
class PerguntaDAO extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function insert(Pergunta $pergunta) {
		$titulo = $pergunta->getTitulo();
		$mensagem = $pergunta->getMensagem();
		$autor = $pergunta->getAutor();

		$sql = "INSERT INTO perguntas (titulo, mensagem, autor) VALUES (:titulo, :mensagem, :autor)";

		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':titulo', $titulo);
		$stmt->bindValue(':mensagem', $mensagem);
		$stmt->bindValue(':autor', $autor);

		$stmt->execute();

		return true;
	}

	public function getPerguntasRespondidas() {
		$dados = array();

		$sql = "SELECT * FROM perguntas WHERE exibe = 's'";

		$stmt = $this->db->query($sql);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$dados = $stmt->fetchAll();
		}

		return $dados;
	}
}