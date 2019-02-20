<?php
class ProdutosController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$dados = array();
		$dados['local'] = 'produtos';

		$dao = new ProdutoDAO;
		$anuncios = $dao->selectAll();

		$dados['anuncios'] = $anuncios;

		$this->loadTemplate('produtos', $dados);
	}

	public function adicionar() {
		$dados = array();
		$dados['local'] = 'produtos';

		if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
			$produto = new Produto();
			$dao = new ProdutoDAO();

			$produto->setTitulo(addslashes($_POST['titulo']));
			$produto->setValor(addslashes($_POST['valor']));
			$produto->setDescricao(addslashes($_POST['descricao']));

			if (isset($_FILES['foto']) && !empty($_FILES['foto'])) {
				$foto = $_FILES['foto'];
				$produto->setFoto($foto);
			}

			if ($dao->insert($produto)) {
				header("Location: ".BASE_URL."produtos");
			} else {
				$dados['msg'] = '
				<div class="alert alert-danger">
					Falha ao adicionar produto.
				</div>';
			}
		}

		$this->loadTemplate('adicionarProduto', $dados);
	}

	public function editar($id) {
		if (empty($_SESSION['usuarioId'])) {
			header("Location: ".BASE_URL);
			exit;
		}

		$dados = array();
		$dados['local'] = 'produtos';

		$dao = new ProdutoDAO();

		$anuncio = $dao->selectById($id);

		$dados['anuncio'] = $anuncio;

		if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
			$produto = new Produto();

			$produto->setId($id);
			$produto->setTitulo(addslashes($_POST['titulo']));
			$produto->setValor(addslashes($_POST['valor']));
			$produto->setDescricao(addslashes($_POST['descricao']));

			if (isset($_FILES['foto']) && !empty($_FILES['foto'])) {
				$foto = $_FILES['foto'];
				$produto->setFoto($foto);
			}

			if ($dao->update($produto)) {
				header("Location: ".BASE_URL."produtos");
			} else {
				$dados['msg'] = '
				<div class="alert alert-danger">
					Falha ao editar produto.
				</div>';
			}
		}

		$this->loadTemplate('editarProduto', $dados);
	}

	public function excluir($id) {
		if (empty($_SESSION['usuarioId'])) {
			header("Location: ".BASE_URL);
			exit;
		}

		$produto = new Produto();
		$dao = new ProdutoDAO();

		$dados = $dao->selectById($id);
		$produto->setId($dados['id']);
		$produto->setFoto($dados['foto']);

		if ($dao->delete($produto)) {
			header("Location: ".BASE_URL."produtos");
		} else {
			
		}
	}

	public function abrir($id) {
		$dados = array();
		$dados['local'] = 'produtos';

		$dao = new ProdutoDAO();

		$anuncio = $dao->selectById($id);

		$dados['anuncio'] = $anuncio;

		$this->loadTemplate('abrirProduto', $dados);
	}
}