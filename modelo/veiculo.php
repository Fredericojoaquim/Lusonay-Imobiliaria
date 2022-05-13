<?php



class Veiculo{
	private $cod_veiculo;
	private $cod_local;
	private $cod_image;
	private $cor;
	private $marca;
	private $modelo;
	private $matricula;
	private $tiponegocio;
	private $estado;
	private $preco;
	private $dataregisto;
	private $airbag;
	private $arcondicionado;
	private $ele_seguranca;
	private $kilometragem;
	private $caixavelocidade;
	private $tipo;
	private $combustivel;
	private $telefone;
	private $email;
	private $prioridade;
	private $equipam_interior;

	

	public function setCodigo($cod){
		$this->cod_veiculo=$cod;
	}

	public function getCodigo(){
		return $this->cod_veiculo;
	}


	public function setCod_local($cod){
		$this->cod_local=$cod;
	}

	public function getCod_local(){
		return $this->cod_local;
	}


	public function setCod_image($cod){
		$this->cod_image=$cod;
	}

	public function getCod_image(){
		return $this->cod_image;
	}

	public function setCor($cod){
		$this->cor=$cod;
	}

	public function getCor(){
		return $this->cor;
	}

	public function setMarca($cod){
		$this->marca=$cod;
	}

	public function getMarca(){
		return $this->marca;
	}

	public function setModelo($cod){
		$this->modelo=$cod;
	}

	public function getModelo(){
		return $this->modelo;
	}

	public function setMatricula($cod){
		$this->matricula=$cod;
	}

	public function getMatricula(){
		return $this->matricula;
	}

	public function setTiponegocio($cod){
		$this->tiponegocio=$cod;
	}

	public function getTponegocio(){
		return $this->tiponegocio;
	}

	public function setEstado($cod){
		$this->estado=$cod;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setPreco($cod){
		$this->preco=$cod;
	}

	public function getPreco(){
		return $this->preco;
	}

	public function setData_registo($cod){
		$this->dataregisto=$cod;
	}

	public function getData_registo(){
		return $this->dataregisto;
	}


	public function setPrioridade($p){
		$this->prioridade=$p;
	}

	public function getPrioridade(){
		return $this->prioridade;
	}

	public function setAirbag($p){
		$this->airbag=$p;
	}

	public function getAirbag(){
		return $this->airbag;
	}

	public function setArcondicionado($p){
		$this->arcondicionado=$p;
	}

	public function getArcondicionado(){
		return $this->arcondicionado;
	}

	public function setEle_seguranca($p){
		$this->ele_seguranca=$p;
	}

	public function getEle_seguranca(){
		return $this->ele_seguranca;
	}

	public function setKilometragem($p){
		$this->kilometragem=$p;
	}

	public function getKilometragem(){
		return $this->kilometragem;
	}

	public function setCaixavelocidade($p){
		$this->caixavelocidade=$p;
	}

	public function getCaixavelocidade(){
		return $this->caixavelocidade;
	}

	public function setTipo($p){
		$this->tipo=$p;
	}

	public function getTipo(){
		return $this->tipo;
	}

	public function setCombustivel($p){
		$this->combustivel=$p;
	}

	public function getCombustivel(){
		return $this->combustivel;
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

	public function setEquipam_interior($cod){
		$this->equipam_interior=$cod;
	}

	public function getEquipam_interior(){
		return $this->equipam_interior;
	}

}





















?>