<?php

include_once('newsletterDao.php');
include_once('../seguranca/validacao.php');

$n=new newletterDao();
$val=new Validacao();

if (isset($_POST['email'])) {
	if (empty($_POST['email'])) {
		echo 'por favor digite seu email';
	}else{
	$email=$val->validarEntrada($_POST['email']);
	
	if ($n->inserir($email)) {
		echo 'Inserido com sucesso';
	}else{
		echo 'erro ao inserir';
	}

	}

	
}







?>