<?php

include_once('conexao/conexao.php');
include_once('modelo/terreno.php');

class TerrenoDao extends Conexao{



	public function inserir(Terreno $p){
		
		$sql="INSERT INTO terreno (cod_local_fk,cod_imagem_fk, preco, tipo_de_negocio, 
			dimensao, telefone, email, data_registo, desc_exterior, desc_interior, prioridade) 
         VALUES (?,?,?,?,?,?,?,?,?,?,?)";
         try{

	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $p->getCodigo_local());
	$stmt->bindValue(2, $p->getCodigo_imagem());
	$stmt->bindValue(3, $p->getPreco());

	$stmt->bindValue(4, $p->getTipo_negocio());
	$stmt->bindValue(5, $p->getDimensao());
	$stmt->bindValue(6, $p->getTelefone());
	$stmt->bindValue(7, $p->getEmail());
	$stmt->bindValue(8, $p->getData_registo());
	$stmt->bindValue(9, $p->getDesc_exterior());
	$stmt->bindValue(10, $p->getDesc_interior());
	$stmt->bindValue(11, $p->getPrioridade());
	if($stmt->execute()){
		return true;
	}
	return false;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}


	public function alterar(Terreno $p){
		
		$sql="UPDATE terreno  SET preco=?, tipo_de_negocio=?, 
			dimensao=?, telefone=?, email=?, desc_exterior=?, desc_interior=?, prioridade=? WHERE cod_terreno=?";
         try{
	$stmt=parent::getConn()->prepare($sql);

	$stmt->bindValue(1, $p->getPreco());

	$stmt->bindValue(2, $p->getTipo_negocio());
	$stmt->bindValue(3, $p->getDimensao());
	$stmt->bindValue(4, $p->getTelefone());
	$stmt->bindValue(5, $p->getEmail());
	$stmt->bindValue(6, $p->getDesc_exterior());
	$stmt->bindValue(7, $p->getDesc_interior());
	$stmt->bindValue(8, $p->getPrioridade());
	$stmt->bindValue(9, $p->getCodigo());
	
	if($stmt->execute()){
		return true;
	}
	return false;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}



	public function excluir($id){
		
		$sql="DELETE FROM terreno WHERE cod_terreno=?";

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

		$sql='select * from terreno, localizacao,imagem  where terreno.cod_local_fk=localizacao.cod_localizacao AND terreno.cod_imagem_fk=imagem.cod_imagem  order by cod_terreno desc';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}
		return false;
	}



	public function buscarDados($codigo){
		$sql='select * from terreno, localizacao,imagem  where terreno.cod_local_fk =localizacao.cod_localizacao 
		AND terreno.cod_imagem_fk=imagem.cod_imagem and cod_terreno=?';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->bindValue(1, $codigo);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}
	}


	public function pesquisar($codigo){
		$sql='select * from terreno, localizacao,imagem  where terreno.cod_local_fk =localizacao.cod_localizacao 
		AND terreno.cod_imagem_fk=imagem.cod_imagem and cod_terreno=?';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->bindValue(1, $codigo);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}
	}

	public function total(){
		$sql='select count(*) as total from terreno';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetch(PDO::FETCH_ASSOC);
			return $resultado['total'];
		}
	}


}












?>