<?php


class Imoveis{


	private $codigo;
	private $codigo_local;
	private $codigo_imagem;
	private $preco;
	private $estado;
	private $tipo_negocio;
	private $desc_interior;
	private $desc_exterior;
	private $telefone;
	private $email;
	private $data_registo;
	private $prioridade;


	public function setCodigo($cod){
		$this->codigo=$cod;
	}

	public function getCodigo(){
		return $this->codigo;
	}

	public function setCodigo_local($cod){
		$this->codigo_local=$cod;
	}

	public function getCodigo_local(){
		return $this->codigo_local;
	}

	public function setCodigo_imagem($cod){
		$this->codigo_imagem=$cod;
	}

	public function getCodigo_imagem(){
		return $this->codigo_imagem;
	}

	public function setPreco($cod){
		$this->preco=$cod;
	}

	public function getPreco(){
		return $this->preco;
	}

	public function setEstado($cod){
		$this->estado=$cod;
	}

	public function getEstado(){
		return $this->estado;
	}



	public function setTipo_negocio($cod){
		$this->tipo_negocio=$cod;
	}

	public function getTipo_negocio(){
		return $this->tipo_negocio;
	}

	public function setDesc_interior($cod){
		$this->desc_interior=$cod;
	}

	public function getDesc_interior(){
		return $this->desc_interior;
	}

	public function setDesc_exterior($cod){
		$this->desc_exterior=$cod;
	}

	public function getDesc_exterior(){
		return $this->desc_exterior;
	}

	public function setTelefone($cod){
		$this->telefone=$cod;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setEmail($cod){
		$this->email=$cod;
	}

	public function getEmail(){
		return $this->email;
	}


	public function setData_registo($cod){
		$this->data_registo=$cod;
	}

	public function getData_registo(){
		return $this->data_registo;
	}


	public function setPrioridade($p){
		$this->prioridade=$p;
	}

	public function getPrioridade(){
		return $this->prioridade;
	}



}






?>