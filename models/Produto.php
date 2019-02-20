<?php
class Produto {
	private $id;
	private $titulo;
	private $valor;
	private $foto;
	private $descricao;

	public function getId() {
		return $this->id;
	}

	public function getTitulo() {
		return $this->titulo;
	}

	public function getValor() {
		return $this->valor;
	}

	public function getFoto() {
		return $this->foto;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setId($id) {
		$this->id = $id;
	}
	
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}
	
	public function setValor($valor) {
		$this->valor = $valor;
	}
	
	public function setFoto($foto) {
		$this->foto = $foto;
	}
	
	public function setDescricao($descricao) {
		$this->descricao = $descricao;
	}
	
	
}