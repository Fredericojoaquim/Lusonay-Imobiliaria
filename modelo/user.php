<?php

class User{
	
	private $codigo;
	private $nome;
	private $email;
	private $nom_utilizador;
	private $senha;
	private $telefone;


	public function setCodigo($c){
		$this->codigo=$c;
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function setNome($c){
		$this->nome=$c;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setEmail($c){
		$this->email=$c;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setSenha($c){
		$this->senha=$c;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setTelefone($c){
		$this->telefone=$c;
	}

	public function getTelefone(){
		return $this->telefone;
	}


	public function setNomeUser($c){
		$this->nom_utilizador=$c;
	}

	public function getNomeUser(){
		return $this->nom_utilizador;
	}


}







?>