<?php
  
include_once('imoveis.php');

class Casa extends Imoveis{


	private $tipologia;
	private $mobilada;
	private $wcs;


	public function setTipologia($cod){
		$this->tipologia=$cod;
	}

	public function getTipologia(){
		return $this->tipologia;
	}


	public function setMobilada($cod){
		$this->mobilada=$cod;
	}

	public function getMobilada(){
		return $this->mobilada;
	}


	public function setWcs($cod){
		$this->wcs=$cod;
	}

	public function getWcs(){
		return $this->wcs;
	}
	



}








?>