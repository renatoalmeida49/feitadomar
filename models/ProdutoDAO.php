<?php
class ProdutoDAO extends Model {

	public function __construct() {
		parent::__construct();
	}


	public function insert(Produto $produto) {
		$titulo = $produto->getTitulo();
		$valor = $produto->getValor();
		$descricao = $produto->getDescricao();

		$sql = "INSERT INTO anuncios (titulo, valor, descricao) VALUES (:titulo, :valor, :descricao)";

		try {
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(':titulo', $titulo);
			$stmt->bindValue(':valor', $valor);
			$stmt->bindValue(':descricao', $descricao);

			$stmt->execute();

			return true;
		} catch (PDOException $e) {
			echo "ERROR: ".$e->getMessage();
		}

		return false;
	}

	public function selectAll() {
		$dados = array();
		$sql = "SELECT * FROM anuncios";

		$stmt = $this->db->query($sql);

		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$dados = $stmt->fetchAll();
		}

		return $dados;
	}

	public function selectById($id) {
		$dados = array();

		$sql = "SELECT * FROM anuncios WHERE id = :id";

		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':id', $id);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$dados = $stmt->fetch();
		}

		return $dados;
	}

	public function update(Produto $produto) {
		$id = $produto->getId();
		$titulo = $produto->getTitulo();
		$valor = $produto->getValor();
		$descricao = $produto->getDescricao();

		$sql = "UPDATE anuncios SET titulo = :titulo, valor = :valor, descricao = :descricao WHERE id = :id";

		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':titulo', $titulo);
		$stmt->bindValue(':valor', $valor);
		$stmt->bindValue(':descricao', $descricao);
		$stmt->bindValue(':id', $id);

		$stmt->execute();

		return true;
	}

	public function delete(Produto $produto) {
		$id = $produto->getId();

		$sql = "DELETE FROM anuncios WHERE id = :id";

		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':id', $id);

		$stmt->execute();

		return true;
	}
}