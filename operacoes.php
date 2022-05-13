<?php

session_start();
require_once'dao/terrenoDao.php';
include_once('dao/localizacaoDao.php');
include_once('dao/imagemDao.php');
include_once('modelo/uploadfile.php');
include_once('seguranca/validacao.php');

$t=new Terreno();
$cDao=new TerrenoDao();
$l=new Localizacao();
$ldao=new LocalizacaoDao();
$im=new Imagem();
$up=new Upload();
$imgdao=new ImagemDao();
$val=new Validacao();

  $mensagem=array();
  $erros=array();

 
  //var_dump($dados);


if (isset($_GET['id_terreno'])) {
   $codigo=$val->filtrovalidateId('id_terreno');
  $dados=$cDao-> buscarDados($codigo);
	
}

if (isset($_POST['btnSave'])) {

  if (empty($_POST['pais'])) {
     $erros[]="<li>O campo País é um campo obrigatório</li>";
  }elseif (empty($_POST['regiao'])) {
     $erros[]="<li>O campo Região é um campo obrigatório</li>";
  }elseif (empty($_POST['municipio'])) {
    $erros[]="<li>O campo Municipio  é um campo obrigatório</li>";
  }elseif (empty($_POST['localidade'])) {
    $erros[]="<li>O campo Localidade  é um campo obrigatório</li>";
  }else{

  $l->setPais($val->validarEntrada($_POST['pais']));
  $l->setRegiao($val->validarEntrada($_POST['regiao']));
  $l->setMunicipio($val->validarEntrada($_POST['municipio']));
  $l->setLocalidade($val->validarEntrada($_POST['localidade']));
  $l->setCodigo($val->filtrovalidateCodigo('codigoloc'));

  if (!$ldao->alterar($l)) {
    $erros[]="<li>Erro ao alterar os dados por favor verifique </li>";
  }else{
    //casa

  $t->setPreco($val->validarEntrada($_POST['preco']));
  $t->setTipo_negocio($val->validarEntrada($_POST['tiponegocio']));
  $t->setEstado($val->validarEntrada($_POST['estado']));
  $t->setDesc_interior($val->validarEntrada($_POST['desc_interior']));
  $t->setDesc_exterior($val->validarEntrada($_POST['desc_exterior']));
  $t->setTelefone($val->validarEntrada($_POST['telefone']));
  $t->setEmail($val->validarEntrada($_POST['email']));
  $t->setDimensao($val->validarEntrada($_POST['dimensao']));
  $t->setPrioridade($val->validarEntrada($_POST['prioridade']));
  $t->setCodigo($val->filtrovalidateCodigo('codigo'));

        if ($cDao->alterar($t)) {


     
      $mensagem[]="<li>Registo de Terreno alterado com sucesso </li>";
    }else{
       $erros[]="<li>Erro ao Alterar o registo porfavor verifique os dados </li>";
    }

  
}
}


}











?>