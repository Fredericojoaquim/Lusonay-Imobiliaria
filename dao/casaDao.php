<?php

include_once('conexao/conexao.php');
include_once('modelo/casa.php');




 class CasaDao extends Conexao{


 	public function inserir(Casa $p){
		
		$sql="INSERT INTO casa (cod_local,cod_imagem_fk, preco, estado, tipo_negocio, tipologia,
		 mobilada, wcs, desc_interior, desc_exterior, telefone, email, data_registo,prioridade) 
         VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
         try{

	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $p->getCodigo_local());
	$stmt->bindValue(2, $p->getCodigo_imagem());
	$stmt->bindValue(3, $p->getPreco());
	$stmt->bindValue(4, $p->getEstado());
	$stmt->bindValue(5, $p->getTipo_negocio());
	$stmt->bindValue(6, $p->getTipologia());
	$stmt->bindValue(7, $p->getMobilada());
	$stmt->bindValue(8, $p->getWcs());
	$stmt->bindValue(9, $p->getDesc_interior());
	$stmt->bindValue(10, $p->getDesc_exterior());
	$stmt->bindValue(11, $p->getTelefone());
	$stmt->bindValue(12, $p->getEmail());
	$stmt->bindValue(13, $p->getData_registo());
	$stmt->bindValue(14, $p->getPrioridade());
	if($stmt->execute()){
		return true;
	}
	return false;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}




	public function alterar(Casa $p){
		
		$sql="UPDATE casa SET preco=?, estado=?, tipo_negocio=?, tipologia=?, mobilada=?, wcs=?, desc_interior=?, desc_exterior=?, telefone=?, email=?
         WHERE cod_casa=?";

         try{

	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $p->getPreco());
	$stmt->bindValue(2, $p->getEstado());
	$stmt->bindValue(3, $p->getTipo_negocio());
	$stmt->bindValue(4, $p->getTipologia());
	$stmt->bindValue(5, $p->getMobilada());
	$stmt->bindValue(6, $p->getWcs());
	$stmt->bindValue(7, $p->getDesc_interior());
	$stmt->bindValue(8, $p->getDesc_exterior());
	$stmt->bindValue(9, $p->getTelefone());
	$stmt->bindValue(10, $p->getEmail());
	$stmt->bindValue(11, $p->getCodigo());
	if($stmt->execute()){

		return true;
	}
	return false;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}



	public function excluir($id){
		
		$sql="DELETE FROM casa WHERE cod_casa=?";

         try{
	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $id);
	if($stmt->execute()){

		return true;
	}
	return false;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}




	public function listar(){

		$sql='select * from casa, localizacao,imagem  where casa.cod_local=localizacao.cod_localizacao AND casa.cod_imagem_fk=imagem.cod_imagem  order by cod_casa desc';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}
		return false;
	}


	public function buscarDados($codigo){
		$sql='select * from casa, localizacao,imagem  where casa.cod_local=localizacao.cod_localizacao 
		AND casa.cod_imagem_fk=imagem.cod_imagem and cod_casa=?';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->bindValue(1, $codigo);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}
	}


	public function pesquisar($codigo){
		$sql='select * from casa, localizacao,imagem  where casa.cod_local=localizacao.cod_localizacao 
		AND casa.cod_imagem_fk=imagem.cod_imagem and cod_casa=?';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->bindValue(1, $codigo);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}
	}


	public function total(){
		$sql='select count(*) as total from casa';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetch(PDO::FETCH_ASSOC);
			return $resultado['total'];
		}
	}












 }





//$c=new CasaDao();

//var_dump($c->buscarDados(2)) ;






?>