<?php
class Pergunta {
	private $id;
	private $titulo;
	private $mensagem;
	private $autor;
	private $resposta;
	private $exibe;

	public function getId() {
		return $this->id;
	}

	public function getTitulo() {
		return $this->titulo;
	}

	public function getMensagem() {
		return $this->mensagem;
	}

	public function getAutor() {
		return $this->autor;
	}

	public function getResposta() {
		return $this->resposta;
	}

	public function getExibe() {
		return $this->exibe;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}

	public function setMensagem($mensagem) {
		$this->mensagem = $mensagem;
	}

	public function setAutor($autor) {
		$this->autor = $autor;
	}

	public function setResposta($resposta) {
		$this->resposta = $resposta;
	}

	public function setExibe($exibe) {
		$this->exibe = $exibe;
	}

}