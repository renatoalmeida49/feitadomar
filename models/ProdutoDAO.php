<?php
class ProdutoDAO extends Model {

	public function __construct() {
		parent::__construct();
	}


	public function insert(Produto $produto) {
		$titulo = $produto->getTitulo();
		$valor = $produto->getValor();
		$descricao = $produto->getDescricao();
		$foto = $produto->getFoto();

		if ($foto['type'] == 'image/jpeg' || $foto['type'] == 'image/png') {
			$tmpname = md5(time().rand(0, 99)).'.jpg';

			move_uploaded_file($foto['tmp_name'], 'assets/images/anuncios/'.$tmpname);

			list($width_orig, $height_orig) = getimagesize('assets/images/anuncios/'.$tmpname);
			$ratio = $width_orig/$height_orig;

			$width = 500;
			$height = 500;

			if ($width/$height > $ratio) {
				$width = $height * $ratio;
			} else {
				$height = $width/$ratio;
			}

			$img = imagecreatetruecolor($width, $height);

			if ($foto['type'] == 'image/jpeg') {
				$orig = imagecreatefromjpeg('assets/images/anuncios/'.$tmpname);
			} else if ($foto['type'] == 'image/png') {
				$orig = imagecreatefrompng('assets/images/anuncios/'.$tmpname);
			}

			imagecopyresampled($img, $orig, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

			imagejpeg($img, 'assets/images/anuncios/'.$tmpname, 80);

			$sql = "INSERT INTO anuncios (titulo, valor, foto, descricao) VALUES (:titulo, :valor, :foto, :descricao)";

			try {
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(':titulo', $titulo);
				$stmt->bindValue(':valor', $valor);
				$stmt->bindValue(':foto', $tmpname);
				$stmt->bindValue(':descricao', $descricao);

				$stmt->execute();

				return true;
			} catch (PDOException $e) {
				echo "ERROR: ".$e->getMessage();
			}
		} else {
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
		$foto = $produto->getFoto();

		if (($foto['type'] == 'image/jpeg' || $foto['type'] == 'image/png') && $foto['tmpname'] != 'indisponivel.jpg') {
			$dados = $this->selectById($id);

			if ($dados['foto'] != 'indisponivel.jpg') {
				$fotosDel = 'assets/images/anuncios/'.$dados['foto'];
				unlink($fotosDel);
			}

			$tmpname = md5(time().rand(0, 99)).'.jpg';

			move_uploaded_file($foto['tmp_name'], 'assets/images/anuncios/'.$tmpname);

			list($width_orig, $height_orig) = getimagesize('assets/images/anuncios/'.$tmpname);
			$ratio = $width_orig/$height_orig;

			$width = 500;
			$height = 500;

			if ($width/$height > $ratio) {
				$width = $height * $ratio;
			} else {
				$height = $width/$ratio;
			}

			$img = imagecreatetruecolor($width, $height);

			if ($foto['type'] == 'image/jpeg') {
				$orig = imagecreatefromjpeg('assets/images/anuncios/'.$tmpname);
			} else if ($foto['type'] == 'image/png') {
				$orig = imagecreatefrompng('assets/images/anuncios/'.$tmpname);
			}

			imagecopyresampled($img, $orig, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

			imagejpeg($img, 'assets/images/anuncios/'.$tmpname, 80);

			$sql = "UPDATE anuncios SET titulo = :titulo, valor = :valor, foto = :foto, descricao = :descricao WHERE id = :id";

			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(':titulo', $titulo);
			$stmt->bindValue(':valor', $valor);
			$stmt->bindValue(':foto', $tmpname);
			$stmt->bindValue(':descricao', $descricao);
			$stmt->bindValue(':id', $id);

			$stmt->execute();

			return true;
		} else {
			$sql = "UPDATE anuncios SET titulo = :titulo, valor = :valor, descricao = :descricao WHERE id = :id";

			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(':titulo', $titulo);
			$stmt->bindValue(':valor', $valor);
			$stmt->bindValue(':descricao', $descricao);
			$stmt->bindValue(':id', $id);

			$stmt->execute();

			return true;
		}
	}

	public function delete(Produto $produto) {
		$id = $produto->getId();

		if ($produto->getFoto() != 'indisponivel.jpg') {
			$fotosDel = 'assets/images/anuncios/'.$produto->getFoto();
			unlink($fotosDel);
		}

		$sql = "DELETE FROM anuncios WHERE id = :id";

		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(':id', $id);

		$stmt->execute();

		return true;
	}

	public function selectLastProducts() {
		$dados = array();

		$sql = "SELECT * FROM anuncios LIMIT 12";

		$stmt = $this->db->query($sql);

		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$dados = $stmt->fetchAll();
		}

		return $dados;
	}
}