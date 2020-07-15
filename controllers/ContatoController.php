<?php
class ContatoController extends Controller {

	public function index() {
		$dados = array();
		$dados['local'] = 'contato';

		$pergunta = new Pergunta();
		$dao = new PerguntaDAO(Database::getInstance());

		$respostas = $dao->getPerguntasRespondidas();
		$dados['respostas'] = $respostas;

		$perguntas = $dao->getPerguntasSemResposta();
		$dados['perguntas'] = $perguntas;

		if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {

			$pergunta->setTitulo(addslashes($_POST['titulo']));
			$pergunta->setMensagem(addslashes($_POST['mensagem']));
			$pergunta->setAutor(addslashes($_POST['autor']));

			if ($dao->insert($pergunta)) {
				$dados['msg'] = '
				<div class="alert alert-success">
					Pronto! Em breve sua mensagem será respondida.
				</div>';
			} else {
				$dados['msg'] = '
				<div class="alert alert-danger">
					Houve algum problema ao enviar sua mensagem.
				</div>';
			}
		}

		if (isset($_POST['resposta']) && !empty($_POST['resposta'])) {
			$id = $_POST['responder'];
			$resposta = addslashes($_POST['resposta']);

			$pergunta->setResposta($resposta);
			$pergunta->setId($id);

			if ($dao->update($pergunta)) {
				header("Location: ".BASE_URL."contato");
			} else {
				echo "Algo deu errado na att";
			}
		}

		$this->loadTemplate('contato', $dados);
	}

	public function editarResposta($id) {
		$dados = array();
		$dados['local'] = 'contato';
		$dao = new PerguntaDAO(Database::getInstance());

		$pergunta = $dao->selectById($id);

		$dados['pergunta'] = $pergunta;

		if (isset($_POST['resposta']) && !empty($_POST['resposta'])) {
			$resposta = addslashes($_POST['resposta']);

			$p = new Pergunta();

			$p->setResposta($resposta);
			$p->setId($id);

			if ($dao->update($p)) {
				header("Location: ".BASE_URL."contato");
			} else {
				echo "Algo errado na edição de resposta";
			}
		}

		$this->loadTemplate('editarResposta', $dados);
	}

	public function excluirResposta($id) {
		$pergunta = new Pergunta();
		$dao = new PerguntaDAO(Database::getInstance());

		$pergunta->setId($id);

		if ($dao->delete($pergunta)) {
			header("Location: ".BASE_URL."contato");
		} else {
			echo "Algo deu errado na exclusão";
		}
	}

}