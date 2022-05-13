<?php
session_start();

if (!isset($_SESSION['logado'])) {

header("Location: index.php");

}

require_once'dao/userDao.php';
include_once('dao/localizacaoDao.php');
include_once('dao/imagemDao.php');
include_once('modelo/uploadfile.php');
include_once('seguranca/validacao.php');

$c=new User();
$cDao=new UserDao();
$l=new Localizacao();
$ldao=new LocalizacaoDao();
$im=new Imagem();
$up=new Upload();
$imgdao=new ImagemDao();
$val=new Validacao();

  $mensagem=array();
  $erros=array();

 
  //var_dump($dados);


if (isset($_GET['id_user'])) {
   $codigo=$val->filtrovalidateId('id_user');
  $dados=$cDao->listar($_SESSION['codigo_user']);

	
}

if (isset($_POST['btnSave'])) {

   if (empty($_POST['nome'])) {
     $erros[]="<li>O campo Nome é um campo obrigatório</li>";
  }elseif (empty($_POST['email'])) {
     $erros[]="<li>O campo Email é um campo obrigatório</li>";
  }elseif (empty($_POST['nomeuser'])) {
    $erros[]="<li>O campo Nome de utilizador  é um campo obrigatório</li>";
  }elseif (empty($_POST['telefone'])) {
    $erros[]="<li>O campo Telefone  é um campo obrigatório</li>";
  }elseif (empty($_POST['senha'])) {
    $erros[]="<li>O campo Senha  é um campo obrigatório</li>";
  }elseif (empty($_POST['confsenha'])) {
     $erros[]="<li>O campo Confirmar Senha  é um campo obrigatório</li>";
  }elseif (empty($_POST['coduser'])) {
     $erros[]="<li>Erro na submissão do formulário, porfavor tente mais tarde</li>";
  }else{

 if (strcmp($_POST['senha'], $_POST['confsenha'])!=0) {
 $erros[]="<li>as senhas digitadas não são iguais</li>";
 }else{
 
  //casa
  $c->setNome($val->validarEntrada($_POST['nome']));
  $c->setEmail($val->validarEntrada($_POST['email']));
  $c->setTelefone($val->validarEntrada($_POST['telefone']));
  $c->setNomeUser($val->validarEntrada($_POST['nomeuser']));
  $senha=password_hash($val->validarEntrada($_POST['senha']),PASSWORD_DEFAULT);
  $c->setSenha($senha);
  $c->setCodigo($val->filtrovalidateCodigo('coduser'));
  
      if ($cDao->alterar($c)) {
     
      $mensagem[]="<li>User Alterado com sucesso </li>";
    }else{
       $erros[]="<li>Erro ao alterar porfavor verifique os dados </li>";
    }

}
}


 
}




?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!--Tags metas-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="somos uma empresa que actua no sector de imobiliaria, consultoria e hipotéca">
  <meta name="keywords" content="imóveis, imobiliaria, consultoria, casa, casas, carro, terrenos">
  <meta name="rebots" content="index,fololw">
  <meta name="author" content="trycode-formação e tecnologia">
    
  <!--Import Google Icon Font-->
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <!--fontawesome-->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!--  materialize css-->
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/custom.css">
   
   <!--Icon da barra de titulo-->
     <link rel="icon" href="img/logo (2).png">
  <title>Try Code</title>

</head>
<!--Body-->

<body>
  <header>
         <!--Menu mobile-->
       <ul class="side-nav" id="menu-mobile">
                    <li><a class="hide-menu"href="index.php">Inicio</a></li>
                    <li><a class="hide-menu "href="user.php">Usuário</a></li>
                    <li><a class="hide-menu" href="admin.php">Casa</a></li>
                    <li><a class="hide-menu" href="terreno.php">Terrenos</a></li>
                    <li><a class="hide-menu" href="#cursos">Veículos</a></li>


        </ul>

        <div class="navbar-fixed ">
        <nav class="navbar z-depth-0" >
            <div class="nav-wrapper container black-text">
                <h1 class="logo_text">Try Code-formação & tecnologia</h1>
                
                <ul class="right light hide-on-med-and-down">
                    <li><a class="hide-menu"href="index.php">Inicio</a></li>
                    <li><a class="hide-menu "href="user.php">Usuário</a></li>
                    <li><a class="hide-menu" href="admin.php">Casa</a></li>
                    <li><a class="hide-menu " href="terreno.php">Terrenos</a></li>
                    <li><a class="hide-menu" href="#cursos">Veículos</a></li>
                </ul>
                <a href="#" data-activates="menu-mobile" class="button-collapse right"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        </div>
        <div class="row  nav-color navdistancia"></div>
    </header>



  <section class="principal">


    <div class="">

      <?php
     

      if (!empty($erros)) {
         foreach ($erros as $e) {
          echo '<div class="row container mensagem red white-text">'.$e.'</div>';
      }
    }

      if (!isset($dados)) {
        $dados=$cDao-> listar($_SESSION['codigo_user']);
      }

       if (!empty($mensagem)) {
          foreach ($mensagem as $e) {
          echo '<div class="row container mensagem green white-text">'.$e.'</div>';
           }
        }else{

      ?>

        

      

          <div class="container">


            <div class="card-panel">


        <div class="row cor_fundo_padrao"><h4 class="light center white-text">Alterar Registo de  Usuário</h4></div>
        <form  class="col s12" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">

           <div class="row">

              <div class="row">

        <div class="input-field col s6">
          <input id="nome" type="text" class="validate" name="nome" value="<?php echo  $dados['nome'];?>" required>
          <label for="nome">Nome</label>
        </div>

          <div class="input-field col s6">
          <input id="email" type="email" class="validate" name="email"  value="<?php echo  $dados['email'];?>"required>
          <label for="email">Email</label>
        </div>
    

        <div class="input-field col s6">
          <input id="nomeuser" type="text" class="validate" name="nomeuser" value="<?php echo  $dados['num_utilizador'];?>" required>
          <label for="nomeuser">Nome de utilizador</label>
        </div>

        <div class="input-field col s6">
          <input id="telefone" type="text" class="validate" name="telefone" value="<?php echo  $dados['telefone'];?>" required>
          <label for="telefone">Telefone</label>
        </div>

        <div class="input-field col s6">
          <input id="senha" type="password" class="validate" name="senha" require>
          <label for="senha">Senha</label>
        </div>

         <div class="input-field col s6">
          <input id="confsenha" type="password" class="validate" name="confsenha" require>
          <label for="confsenha">Confirmar Senha</label>
        </div>


        <div class="input-field col s6">
          <input  type="hidden" class="validate" name="token">
          <input  type="hidden" class="validate" name="coduser" value="<?php echo $_SESSION['codigo_user'];?>">
        </div>

      </div>
      <div class="right footerbutom">
          <button name="btnSave" type="submit" class="waves-effect waves-green  btn blue">alterar</button>
       
      </div>

      </div>
     </form>
     
    </div>

   </div>

<?php
}

?>



  </section>











    <footer class="page-footer black">
    <div class="container" id="f">
        <div class="row">

            <div class="col s12 l4 ">
                <h4 class="center cor_titulo_padra titulo">NEWS LETTER</h4>
                <p class="center">fique por dentro das novidades e receba todos os dias em seu email as novidades do nosso site, ou simplesmente mostre ao mundo que você faz parte deste projecto sensacional</p>
                        <form class="">
                            <div class="input-field search-wrapper white">
                            <input  type="text" class="validate entrada">
                             <label class="active center" for="first_name2">digite seu email</label>
                            </div>
                            <div class="center"><button class="btn cor_fundo_padrao">Enviar</button></div>
                        </form> 
             </div>


             <div class="col s12 l4 center">
                <h4 class="center cor_titulo_padra titulo">Contactos</h4>
                    <p class="light paragrafo sobreh">Bairro Dangereux-paragem do Muxicheiro municipio de Talatona</p>
                    <p class="light paragrafo texto contato_title">
                    (+244) 947 042 925<br>
                    (+244) 931 342 396<br>
                    (+244) 991 204 726<br>
                    (+244) 913 342 396<br>
                    Email: geral@trycode.co
                    </p>

            </div>    

             <div class="col s12 l4 center">
                <h4 class="center cor_titulo_padra titulo">REDES SOCIAIS</h4>
                    <p class="light paragrafo texto">Siga-nos nas redes sociais </p>
                    <a href="" class="btn-floating cor_fundo_padrao"><i class="fa fa-facebook"></i></a>
                    <a href="" class="btn-floating cor_fundo_padrao"><i class="fa fa-google"></i></a>
                    <a href="" class="btn-floating cor_fundo_padrao"><i class="fa fa-twitter"></i></a>
                     <a href="" class="btn-floating cor_fundo_padrao"><i class="fa fa-instagram"></i></a>

             </div>
          




            

        </div>

    </div>

    <div class="footer-copyright  blue darken-4">
        <div class="row container center ">
            <article class="col s12 l6 copfooter">© 2022 Lusonay Imobiliária–Todos direitos reservados.<br></article>
            <article class="col s12 l6 copfooter"> Desenvolvido por: Try Code-formação & Tecnologia</article>
           
        </div>
    </div>

</footer>






   <div id="modalcasaalt" class="modal">
     <div class="modal-content">

      <h4 class="light center blue-text">Alterar registo de casa</h4>

      <div class="row center" id="altcasa">

        
       

      </div>

    </div>

    
  </div>


  
    
  <!--  jquery-->
  <script src="js/jquery-3.6.0.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--  javascript-->
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->
  <script src="js/materialize.js"></script>
  <script >
               
       $(document).ready(function(){
    $('select').material_select();
     //modal
     $('.modal').modal({
       dismissible: false
       });

       //menu Mobile
       $(".button-collapse").sideNav();
       //links internos
       $(".scrollspy").scrollSpy({
          scrollOffset:0
       });
       

       //esconder menu ao clicar
       $(".hide-menu").click(function(){
        $(".button-collapse").sideNav("hide");

       });
       //autoplay
       function autoplay(){
        $(".carousel").carousel("next");
        setTimeout(autoplay,4500);
       }

       //chamada da função autoplay
       autoplay();

     });
     //função javascript para adicionar cor a nav dinamicamente
     $(window).on("scroll", function(){

      if ($(window).scrollTop()>100) {
        $(".navbar").addClass("nav-color");
      }else{
           $(".navbar").removeClass("nav-color");

      }
     });

     $(document).on('click','.view_data',function(){
      var id_casa=$(this).attr("id");
      //verificar se o valor esta na variavel
      
      if (id_casa !== '') {
        //alert(id_casa);
        var dados={
          id_casa: id_casa
        };
        //alert(dados);

        $.post('excluir.php', dados, function (retorna){
         //alert(retorna);
          //carregando modal
        //  M.toast({html: 'visualizado'},3000 );// codigo para executal o toast no materialize
       

          $(document).ready(function(){
            
            $("#modalcasaalt").html(retorna);
            $('#modalcasaalt').modal({
              dismissible: false
            });
            $('#modalcasaalt').modal('open');

          });
          
        

        })
        //
        /* $.post('visualizar.php', function (retorna){
         // alert(retorna);
          //carregando modal
          if (retorna==2) {

            M.toast({html: 'visualizado'},3000);
          };
          
       

        })


        //*/

      };
    });



       
       
        


 
  </script>



          

  </body>




</html>