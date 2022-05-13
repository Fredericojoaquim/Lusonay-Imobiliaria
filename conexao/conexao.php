<?php

class Conexao{
	

	private static $instance;

	public static function getConn(){
		if (!isset(self::$instance)) {
			$opcao=$arrayName = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);//PARA HABILITAR  O LANÇAMENTO DAS EXCEPÇOES DO PDO
			self::$instance=new \PDO('mysql:host=localhost; dbname=lusonay_imobiliaria; charset=utf8','root','',$opcao);
		}
		return self::$instance;
	}
}











?>