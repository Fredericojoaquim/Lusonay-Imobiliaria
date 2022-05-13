<?php

include_once('conexao/conexao.php');
include_once('modelo/user.php');


class UserDao extends Conexao{


	public function inserir(User $u){
		
		$sql="INSERT INTO user (nome, email, telefone,num_utilizador, senha) 
         VALUES (?,?,?,?,?)";
         try{

	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $u->getNome());
	$stmt->bindValue(2, $u->getEmail());
	$stmt->bindValue(3, $u->getTelefone());
	$stmt->bindValue(4, $u->getNomeUser());
	$stmt->bindValue(5, $u->getSenha());

	if($stmt->execute()){
		return true;
	}
	return false;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}



	public function alterar(User $u){
		
		$sql="UPDATE user SET nome=?, email=?, telefone=?,num_utilizador=?, senha=? WHERE cod_user=? ";
         try{

	$stmt=parent::getConn()->prepare($sql);
	$stmt->bindValue(1, $u->getNome());
	$stmt->bindValue(2, $u->getEmail());
	$stmt->bindValue(3, $u->getTelefone());
	$stmt->bindValue(4, $u->getNomeUser());
	$stmt->bindValue(5, $u->getSenha());
	$stmt->bindValue(6, $u->getCodigo());

	if($stmt->execute()){
		return true;
	}
	return false;
		}catch(PDOException $e){
			echo $e->getMessage();

		}
	}


	public function buscarDados($n){
		$sql='select * from user where num_utilizador=?';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->bindValue(1, $n);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}
	}

	


	public function listar($id){

		$sql='select * from user where cod_user=?';
		$stmt=parent::getConn()->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$resultado=$stmt->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}
		return false;
	}





}








?>