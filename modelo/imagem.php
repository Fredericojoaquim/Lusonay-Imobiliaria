<?php

class Imagem{
	
	private $codigo;
	private $img1;
	private $img2;
	private $img3;
	private $img4;
	private $img5;

	public function setCodigo($cod){
		$this->codigo=$cod;
	}

	public function getCodigo(){
		return $this->codigo;
	}


	public function setImg1($c){
		$this->img1=$c;
	}

	public function getImg1(){
		return $this->img1;
	}
	public function setImg2($c){
		$this->img2=$c;
	}

	public function getImg2(){
		return $this->img2;
	}


	public function setImg3($c){
		$this->img3=$c;
	}

	public function getImg3(){
		return $this->img3;
	}


	public function setImg4($c){
		$this->img4=$c;
	}

	public function getImg4(){
		return $this->img4;
	}


	public function setImg5($c){
		$this->img5=$c;
	}

	public function getImg5(){
		return $this->img5;
	}



}








?>