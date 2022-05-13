<?php

class Localizacao{

	private $codigo;
	private $pais;
	private $regiao;
	private $localidade;
	private $municipio;

	public function setCodigo($cod){
		$this->codigo=$cod;
	}

	public function getCodigo(){
		return $this->codigo;
	}


	public function setPais($cod){
		$this->pais=$cod;
	}

	public function getPais(){
		return $this->pais;
	}

	public function setRegiao($cod){
		$this->regiao=$cod;
	}

	public function getRegiao(){
		return $this->regiao;
	}


	public function setLocalidade($cod){
		$this->localidade=$cod;
	}

	public function getLocalidade(){
		return $this->localidade;
	}

	public function setMunicipio($cod){
		$this->municipio=$cod;
	}

	public function getMunicipio(){
		return $this->municipio;
	}
}






?>