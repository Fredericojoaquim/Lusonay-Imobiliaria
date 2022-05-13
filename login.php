<?php

session_start();
require_once'dao/userDao.php';
include_once('dao/localizacaoDao.php');
include_once('dao/imagemDao.php');
include_once('modelo/uploadfile.php');
include_once('seguranca/validacao.php');

$c=new User();
$cDao=new UserDao();
$val=new Validacao();
$mensagem=array();
$erros=array();


if (isset($_POST['btnlogin'])) {
  $nomeuser=$val->validarEntrada($_POST['user']);
$senha=$val->validarEntrada($_POST['senha']);


$dados=$cDao->buscarDados($nomeuser);
if ($_SESSION['_token']==$_POST['token']) {
  if (empty($dados)) {
  $erros[]="<li>Nome de utilizador inválido </li>";
}else{
    foreach ($dados as $dado) {
      if (password_verify($senha, $dado['senha'])) {

      $_SESSION['logado']=true;
      $_SESSION['codigo_user']=$dado['cod_user'];
      $_SESSION['_token']=hash('sha512', rand(100,1000));//crf ataque
      header('Location: user.php');
      break;
      }else{
         $erros[]="<li>Senha invalida </li>";
      }
    
  }

}
}else{
  $erros[]="<li>Erro na submissão do formulário por favor tente mais tarde</li>";
}




}











?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/estilo_login.css" type="text/css" rel="stylesheet" />
    <!-- Links para o CSS materialize  -->
   <!--Import Google Icon Font-->
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <!--fontawesome-->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!--  materialize css-->
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/custom.css">
   
   <!--Icon da barra de titulo-->
       <link rel="icon" href="img/site1.png">
    <title>Login</title>
</head>

<body class="mainlogin">
    

        <div class="formlogin ">

                 <?php
            if (!empty($erros)) {
               foreach ($erros as $e) {
                echo '<div class="row margem_login sms_margem red white-text">'.$e.'</div>';
            }
          }
          ?>

          <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" class="margem_login">
            <div class="center"> <img src="img/site1.png" class="iconelogo"> </div>
            <p class="center blue-text plogin">Por favor faça seu login</p>
           
          <div class="">
            <div class="input-field col s6 center">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_telephone" type="text" name="user" class="validate"  maxlength="50" required  >
          <label for="icon_telephone">Digite seu nome de usuário</label>
           </div>

            <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input id="icon_prefix" type="password" name="senha" class="validate"  class="validate"  maxlength="40" required autofocus>
          <label for="icon_prefix">Digite sua senha </label>
        </div>
        </div>

        <br>
         <p class="center margem_login"><a href="" id="a1">Redifinir Senha</a></p>
            <input type="submit" value="Entrar" class="btn cor_fundo_padrao btnlogin" name="btnlogin"> 
            <input  type="hidden" class="validate" name="token" value="<?php echo $_SESSION['_token'];?>"><br><br>
            <a href="index.php" class="btn red btnlogin margem_login">Sair</a>
        </form>


        </div>
        
  <!--  jquery-->
  <script src="js/jquery-3.6.0.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--  javascript-->
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->
  <script src="js/materialize.js"></script>
</body>

</html>