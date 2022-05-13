<?php
include_once('conexao/conexao.php');
include_once('modelo/veiculo.php');

class VeiculoDao extends Conexao{


	public function inserir(Veiculo $p){
		
		$sql="INSERT INTO veiculo (cod_local_fk,cod_imagem_fk,preco,data_registo,estado,
			tipo_negocio,airbag,arcondicionado,ele_seguranca,equipam_interior,
			kilometragem,caixa_velocidade,modelo,marca,matricula,cor,comustivel,telefone,email, prioridade) 
         VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

         try{

	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $p->getCod_local());
	$stmt->bindValue(2, $p->getCod_image());
	$stmt->bindValue(3, $p->getPreco());
	$stmt->bindValue(4, $p->getData_registo());
	$stmt->bindValue(5, $p->getEstado());
	$stmt->bindValue(6, $p->getTponegocio());
	$stmt->bindValue(7, $p->getAirbag());
	$stmt->bindValue(8, $p->getArcondicionado());
	$stmt->bindValue(9, $p->getEle_seguranca());
	$stmt->bindValue(10, $p->getEquipam_interior());
	$stmt->bindValue(11, $p->getKilometragem());
	$stmt->bindValue(12, $p->getCaixavelocidade());
	$stmt->bindValue(13, $p->getModelo());
	$stmt->bindValue(14, $p->getMarca());
	$stmt->bindValue(15, $p->getMatricula());
	$stmt->bindValue(16, $p->getCor());
	$stmt->bindValue(17, $p->getCombustivel());
	$stmt->bindValue(18, $p->getTelefone());
	$stmt->bindValue(19, $p->getEmail());
	$stmt->bindValue(20, $p->getPrioridade());
	if($stmt->execute()){
		return true;
	}
	return false;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}



	public function alterar(Veiculo $p){
		
		$sql="UPDATE  veiculo  SET preco=?,estado=?,
			tipo_negocio=?,airbag=?,arcondicionado=?,ele_seguranca=?,equipam_interior=?,
			kilometragem=?,caixa_velocidade=?,modelo=?,marca=?,matricula=?,cor=?,comustivel=?,telefone=?,email=?, prioridade=?
         WHERE cod_veiculo=?";

         try{

	$stmt=parent::getConn()->prepare($sql);

	$stmt->bindValue(1, $p->getPreco());
	$stmt->bindValue(2, $p->getEstado());
	$stmt->bindValue(3, $p->getTponegocio());
	$stmt->bindValue(4, $p->getAirbag());
	$stmt->bindValue(5, $p->getArcondicionado());
	$stmt->bindValue(6, $p->getEle_seguranca());
	$stmt->bindValue(7, $p->getEquipam_interior());
	$stmt->bindValue(8, $p->getKilometragem());
	$stmt->bindValue(9, $p->getCaixavelocidade());
	$stmt->bindValue(10, $p->getModelo());
	$stmt->bindValue(11, $p->getMarca());
	$stmt->bindValue(12, $p->getMatricula());
	$stmt->bindValue(13, $p->getCor());
	$stmt->bindValue(14, $p->getCombustivel());
	$stmt->bindValue(15, $p->getTelefone());
	$stmt->bindValue(16, $p->getEmail());
	$stmt->bindValue(17, $p->getPrioridade());
	$stmt->bindValue(18, $p->getCodigo());

	if($stmt->execute()){
		return true;
	}
	return false;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}


	public function excluir($id){
		$sql="DELETE FROM veiculo WHERE cod_veiculo=?";

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

		$sql='select * from veiculo, localizacao,imagem  where veiculo.cod_local_fk=localizacao.cod_localizacao AND veiculo.cod_imagem_fk=imagem.cod_imagem  order by cod_veiculo desc';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}
		return false;
	}

	public function buscarDados($codigo){
		$sql='select * from veiculo, localizacao,imagem  where veiculo.cod_local_fk=localizacao.cod_localizacao 
		AND veiculo.cod_imagem_fk=imagem.cod_imagem  AND cod_veiculo=?';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->bindValue(1, $codigo);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}
	}

	public function pesquisar($codigo){
    $sql='select * from veiculo, localizacao,imagem  where veiculo.cod_local_fk=localizacao.cod_localizacao 
		AND veiculo.cod_imagem_fk=imagem.cod_imagem  AND cod_veiculo=?';
    $stmt=parent::getConn()->prepare($sql);
    $stmt->bindValue(1, $codigo);
    $stmt->execute();
    if($stmt->rowCount()>0){
      $resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    }
  }




}










?>