<?php
class ContatoController extends Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index() {
		$dados = array();
		$dados['local'] = 'contato';

		$pergunta = new Pergunta();
		$dao = new PerguntaDAO();

		$perguntas = $dao->getPerguntasRespondidas();
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

		$this->loadTemplate('contato', $dados);
	}

}