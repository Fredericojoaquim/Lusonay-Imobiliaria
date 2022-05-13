<?php

include_once "conexao/conexao.php";
include_once "modelo/localizacao.php";


class LocalizacaoDao extends Conexao{


	//metodo que mostra o codigo do ultimo  registro inserido
	public function UltimoRegisto(){
		$sql='SELECT Max(cod_localizacao) as codigo FROM localizacao';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetch(PDO::FETCH_ASSOC);
			return $resultado['codigo'];
		}
	}

	//metodo inserir localizacao

	public function inserir(Localizacao $p){
		
		$sql="INSERT INTO localizacao (pais, regiao, localidade,municipio) 
         VALUES (?,?,?,?)";
         try{

	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $p->getPais());
	$stmt->bindValue(2, $p->getRegiao());
	$stmt->bindValue(3, $p->getLocalidade());
	$stmt->bindValue(4, $p->getMunicipio());

	if($stmt->execute()){
		return $this->UltimoRegisto();
	}
	return 0;
	
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}


	public function alterar(Localizacao $p){
		
		$sql="UPDATE  localizacao SET pais=?, regiao=?, localidade=?,municipio=? WHERE cod_localizacao=?";
     
         try{

	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $p->getPais());
	$stmt->bindValue(2, $p->getRegiao());
	$stmt->bindValue(3, $p->getLocalidade());
	$stmt->bindValue(4, $p->getMunicipio());
	$stmt->bindValue(5, $p->getCodigo());

	if($stmt->execute()){
		return true;
	}
	return false;
	
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}


	public function excluir($id){
		
		$sql="DELETE FROM localizacao WHERE cod_localizacao=?";

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




}











?>