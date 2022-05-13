<?php

include_once('imoveis.php');


class Terreno extends Imoveis{

	private $dimensao;
	private $descricao;


	public function setDimensao($d){
		$this->dimensao=$d;
	}

	public function getDimensao(){
		return $this->dimensao;
	}


	public function setDescricao($d){
		$this->descricao=$d;
	}

	public function getDescricao(){
		return $this->descricao;
	}




}











?>