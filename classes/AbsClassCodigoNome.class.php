<?php

abstract class AbsClassCodigoNome{
	
	private $codigo;
	private $nome;
	private $usuario;
	private $senha;

	public function getCodigo(){
		return $this->codigo;
	}

	public function setCodigo($codigo){
		$this->codigo = $codigo;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getUsuario(){
    return $this->usuario;
	}

	public function setUsuario($usuario){
	$this->usuario = $usuario;
	}

	public function getSenha(){
	return $this->senha;
	}

	public function setSenha($senha){
	$this->senha = $senha;
	}
}
?>