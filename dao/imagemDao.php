<?php
include_once('conexao/conexao.php');
include_once('modelo/imagem.php');


class ImagemDao extends Conexao{


	//metodo que mostra o codigo do ultimo  registro inserido
	public function UltimoRegisto(){
		$sql='SELECT Max(cod_imagem) as codigo FROM  imagem';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetch(PDO::FETCH_ASSOC);
			return $resultado['codigo'];
		}
	}


	public function inserir(Imagem $img){
		
		$sql="INSERT INTO imagem (foto_principal, foto1, foto2,foto3, foto4) 
         VALUES (?,?,?,?,?)";
         try{

	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $img->getImg1());
	$stmt->bindValue(2, $img->getImg2());
	$stmt->bindValue(3, $img->getImg3());
	$stmt->bindValue(4, $img->getImg4());
	$stmt->bindValue(5, $img->getImg5());

	if($stmt->execute()){
		return $this->UltimoRegisto();
	}
	return 0;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}


	public function excluir($id){
		
		$sql="DELETE FROM imagem WHERE cod_imagem=?";

         try{
	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1,$id);
	if($stmt->execute()){

		return true;
	}
	return false;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}


	public function alterar(Imagem $img){
		
		$sql="UPDATE  imagem SET foto_principal=?, foto1=?, foto2=?,foto3=?, foto4=? WHERE cod_imagem=?";
         try{

	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $img->getImg1());
	$stmt->bindValue(2, $img->getImg2());
	$stmt->bindValue(3, $img->getImg3());
	$stmt->bindValue(4, $img->getImg4());
	$stmt->bindValue(5, $img->getImg5());
	$stmt->bindValue(6, $img->getCodigo());

	if($stmt->execute()){
		return true;
	}
	return false;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}

	public function buscarDados($codigo){
		$sql='select * from imagem where cod_imagem=?';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->bindValue(1, $codigo);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}
	}


}













?>