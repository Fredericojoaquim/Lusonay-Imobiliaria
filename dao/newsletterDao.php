<?php

include_once('../conexao/conexao.php');


class newletterDao extends Conexao{


	public function inserir($email){
		
		$sql="INSERT INTO newsletter  (email) 
         VALUES (?)";
         try{
	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $email);

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