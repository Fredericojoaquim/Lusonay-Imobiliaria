<?php
class Localizacao {

	private $codigo;
	private $pais;
	private $regiao;
	private $municipio;
	private $localizacao;

	public function setCodigo($cod){
		$this->codigo=$cod;
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function setPais($p){
		$this->pais=$p;
	}

	public function getPais(){
		return $this->pais;
	}

	public function setRegiao($p){
		$this->regiao=$p;
	}

	public function getRegiao(){
		return $this->regiao;
	}


	public function setMunicipio($p){
		$this->municipio=$p;
	}

	public function getMunicipio(){
		return $this->municipio;
	}


	public function setLocalizacao($p){
		$this->localizacao=$p;
	}

	public function getLocalizacao(){
		return $this->localizacao;
	}









}










?>