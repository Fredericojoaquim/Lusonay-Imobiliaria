<?php
session_start();

if (!isset($_SESSION['logado'])) {

header("Location: index.php");

}
include_once('dao/casaDao.php');
include_once('dao/localizacaoDao.php');
include_once('dao/imagemDao.php');
include_once('modelo/uploadfile.php');
include_once('seguranca/validacao.php');

$c=new Casa();
$cDao=new CasaDao();
$l=new Localizacao();
$ldao=new LocalizacaoDao();
$im=new Imagem();
$up=new Upload();
$imgdao=new ImagemDao();
$val=new Validacao();

  $mensagem=array();
  $erros=array();

 
  //var_dump($dados);


if (isset($_GET['id_casa'])) {
   $codigo=$val->filtrovalidateId('id_casa');
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

  $c->setPreco($val->validarEntrada($_POST['preco']));
  $c->setTipo_negocio($val->validarEntrada($_POST['tiponegocio']));
  $c->setTipologia($val->validarEntrada($_POST['tipologia']));
  $c->setEstado($val->validarEntrada($_POST['estado']));
  $c->setWcs($val->validarEntrada($_POST['wcs']));
  $c->setMobilada($val->validarEntrada($_POST['mobilada']));
  $c->setDesc_interior($val->validarEntrada($_POST['desc_interior']));
  $c->setDesc_exterior($val->validarEntrada($_POST['desc_exterior']));
  $c->setTelefone($val->validarEntrada($_POST['telefone']));
  $c->setEmail($val->validarEntrada($_POST['email']));
  $c->setCodigo($val->filtrovalidateCodigo('codigo'));

        if ($cDao->alterar($c)) {
     
      $mensagem[]="<li>Registo de casa alterado com sucesso </li>";
    }else{
       $erros[]="<li>Erro ao Alterar o registo porfavor verifique os dados </li>";
    }

  
}
}


}

if ((empty($mensagem) or empty($mensagem)) and (!isset($_GET['id_casa']) )) {
  header('Location: admin.php');
  
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <!--Tags metas-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Desenvolvimento de software, Criação de websites,desenvolvimento de sistemas, Design Gráfico, Markting digital, cursos">
  <meta name="keywords" content="Marketing Digital, Desenvolvimento de software, Design Gráfico,angência de marketing digital, criação de sites, Desenvolvimento de Sistema, cursos de programação, curso de marketing digital">
  <meta name="rebots" content="index,fololw">
  <meta name="author" content="Frederico Joaquim">
    
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
                    <li><a class="hide-menu"href="user.php">Usuário</a></li>
                    <li><a class="hide-menu" href="admin.php">Casa</a></li>
                    <li><a class="hide-menu" href="terreno.php">Terrenos</a></li>
                    <li><a class="hide-menu" href="#cursos">Veículos</a></li>


        </ul>

        <div class="navbar-fixed ">
        <nav class="navbar z-depth-0" >
            <div class="nav-wrapper container black-text">
                <h1 class="logo_text">Try Code-formação & tecnologia</h1>
                
                <ul class="right light hide-on-med-and-down">
                    <li><a class="hide-menu"href="seguranca/logout.php">Inicio</a></li>
                    <li><a class="hide-menu"href="user.php">Usuário</a></li>
                    <li><a class="hide-menu ativo" href="admin.php">Casa</a></li>
                    <li><a class="hide-menu" href="terreno.php">Terrenos</a></li>
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
          echo '<div class="row mensagem container red white-text">'.$e.'</div>';
      }
    }


    if (!empty($mensagem)) {
          foreach ($mensagem as $e) {
          echo '<div class="row mensagem container green white-text">'.$e.'</div>';
           }

    }else{
        

      ?>

        

      

          <div class="container">


            <div class="card-panel">


               <div class="row cor_fundo_padrao"><h4 class="light center white-text">Alterar Registo de casa</h4></div>

      <form  class="col s12" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">

      <div class="row">

        <div class="input-field col s6">
         
          <select name="tiponegocio">
             <option value="<?php echo $dados['tipo_negocio'];?>"><?php echo $dados['tipo_negocio'];?></option>
            <option value="Vende-se">Vende-se</option>
            <option value="Arrenda-se">Arrenda-se</option>
          </select>

        </div>

   

     
        <div class="input-field col s6">
          <input id="tipologia" type="text" class="validate" name="tipologia" value="<?php echo $dados['tipologia'];?>" required>
          <label for="tipologia">Tipologia</label>
        </div>

          <div class="input-field col s6">
          <input id="wcs" type="text" class="validate" name="wcs" value="<?php echo $dados['wcs'];?>"required>
          <label for="wcs">quantidade de wcs</label>
        </div>
    

        <div class="input-field col s6">
          <input id="mobilada" type="text" class="validate" value="<?php echo $dados['mobilada'];?>"name="mobilada" required>
          <label for="mobilada">Mobilada</label>
        </div>

        <div class="input-field col s6">
          <input id="preco" type="text" class="validate" name="preco" value="<?php echo $dados['preco'];?>" require>
          <label for="preco">Preco</label>
        </div>

        <div class="input-field col s6">
         
          <select name="estado">
             <option value="<?php echo $dados['estado'];?>"><?php echo $dados['estado'];?></option>
            <option value="Novo">Novo</option>
            <option value="Usado">Usado</option>
          </select>

        </div>

         <div class="input-field col s12">
          <select name="prioridade">
             <option value="">Selecione a prioridade</option>
            <option value="0">Normal</option>
            <option value="1">Destaque</option>
          </select>
        </div>


       

         <div class="input-field col s12">
          <input id="desc_interior" type="text" class="validate" value="<?php echo $dados['desc_interior'];?>" name="desc_interior" required >
          <label for="desc_interior">descrição interior</label>
        </div>

         <div class="input-field col s12">
          <input id="desc_exterior" type="text" class="validate" name="desc_exterior" value="<?php echo $dados['desc_exterior'];?>" required>
          <label for="desc_exterior">descrição exterior</label>
        </div>

         <div class="input-field col s6">
          <input id="pais" type="text" class="validate" value="<?php echo $dados['pais'];?>" name="pais" required>
          <label for="pais">País</label>
        </div>

        <div class="input-field col s6">
          <input id="regiao" type="text" class="validate" value="<?php echo $dados['regiao'];?>" name="regiao" required>
          <label for="regiao">Região</label>
        </div>

        <div class="input-field col s6">
          <input id="loca" type="text" class="validate" value="<?php echo $dados['localidade'];?>" name="localidade" required>
          <label for="local">Localidade</label>
        </div>

         <div class="input-field col s6">
          <input id="municipio" type="text" class="validate" value="<?php echo $dados['municipio'];?>" name="municipio" required>
          <label for="municipio">Municipio</label>
        </div>


         <div class="input-field col s6">
          <input id="telefone" type="tel" class="validate" name="telefone" value="<?php echo $dados['telefone'];?>" required>
          <label for="telefone">Telefone</label>
        </div>

         <div class="input-field col s6">
          <input id="email" type="email" class="validate" name="email" value="<?php echo $dados['email'];?>" required>
          <label for="email">Email</label>
        </div>

         

        <div class="input-field col s6">
          <input  type="hidden" class="validate" name="token">
           <input  type="hidden" class="validate" name="codigo" value="<?php echo $dados['cod_casa'];?>">
            <input  type="hidden" class="validate" name="codigoloc" value="<?php echo $dados['cod_local'];?>">
        </div>
         
      <div class="right btnaltcasa">
        <button name="btnSave" type="submit" class="waves-effect waves-green btn blue">alterar</button>
      </div>

      </div>
      
    </form>



            </div>


          
          </div>


<?php
}

?>

     


    


      


    </div>




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
                            <div class="center sbmit"><button class="btn cor_fundo_padrao">Enviar</button></div>
                        </form> 
             </div>


             <div class="col s12 l4 center">
                <h4 class="center cor_titulo_padra titulo">Contactos</h4>
                    <p class="light ">Bairro Dangereux-paragem do Muxicheiro municipio de Talatona</p>
                    <p class="light  texto contato_title">
                    (+244) 947 042 925<br>
                    (+244) 931 342 396<br>
                    (+244) 991 204 726<br>
                    (+244) 913 342 396<br>
                    Email: geral@lusonay.co
                    </p>

            </div>    

             <div class="col s12 l4 center">
                <h4 class="center cor_titulo_padra titulo">REDES SOCIAIS</h4>
                    <p class="light">Siga-nos nas redes sociais </p>
                    <a href="" class="btn-floating cor_fundo_padrao"><i class="fa fa-facebook"></i></a>
                    <a href="" class="btn-floating cor_fundo_padrao"><i class="fa fa-google"></i></a>
                    <a href="" class="btn-floating cor_fundo_padrao"><i class="fa fa-twitter"></i></a>
                     <a href="" class="btn-floating cor_fundo_padrao"><i class="fa fa-instagram"></i></a>

             </div>
          




            

        </div>

    </div>

    <div class="footer-copyright  blue darken-4">
        <div class="row container center ">
            <article class="col s12 l6 copfooter firstfooter">© 2022 Lusonay Imobiliária–Todos direitos reservados.<br></article>
            <article class="col s12 l6 copfooter secundfooter"> Desenvolvido por: Try Code-formação & Tecnologia</article>
           
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