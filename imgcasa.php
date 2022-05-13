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

 


if (isset($_GET['id_img'])) {
	 $codigo=$val->filtrovalidateId('id_img');
   
   $_SESSION['cod_img']=$codigo;
  //var_dump($dados);
	
}

if (isset($_POST['btnSave'])) {

   if (!$up->formatofile('path1')) {
      $erros[]="<li>formato de ficheiro invalido </li>";
    }elseif (!$up->formatofile('path2')) {
      $erros[]="<li>formato de ficheiro invalido </li>";
    }elseif (!$up->formatofile('path3')) {
      $erros[]="<li>formato de ficheiro invalido </li>";
    }elseif (!$up->formatofile('path4')) {
      $erros[]="<li>formato de ficheiro invalido </li>";
    }elseif (!$up->formatofile('path5')) {
      $erros[]="<li>formato de ficheiro invalido </li>";
    }else{

      $im->setImg1($up->uploadFile('path1'));
      $im->setImg2($up->uploadFile('path2'));
      $im->setImg3($up->uploadFile('path3'));
      $im->setImg4($up->uploadFile('path4'));
      $im->setImg5($up->uploadFile('path5'));
      $im->setCodigo($_SESSION['cod_img']);

      $dados=$imgdao->buscarDados( $_SESSION['cod_img']);


      if ($imgdao->alterar($im)) {
        //eliminando as imagens do servidor
          unlink($dados['foto_principal']);
          unlink($dados['foto1']);
          unlink($dados['foto2']);
          unlink($dados['foto3']);
          unlink($dados['foto4']);
         $mensagem[]="<li>Imagens alterada com sucesso </li>";
      }else{

         $erros[]="<li>Erro ao alterar a imagem, por favor verifique os dados </li>";

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
    <link rel="icon" href="img/site1.png">
  <title>Lusonay Imobiliaria</title>

</head>
<!--Body-->

<body>
  <header>
         <!--Menu mobile-->
       <ul class="side-nav" id="menu-mobile">
                    <li><a class="hide-menu"href="index.php">Inicio</a></li>
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
      if (!empty($mensagem)) {
          foreach ($mensagem as $e) {
          echo '<div class="row mensagem green white-text">'.$e.'</div>';
           }
        }

      if (!empty($erros)) {
         foreach ($erros as $e) {
          echo '<div class="row mensagem red white-text">'.$e.'</div>';
      }
    }

      $dados=$imgdao-> buscarDados($_SESSION['cod_img']);

      ?>

        

      

          <div class="largurapainel">


            <div class="card-panel">
              <h4 class="center blue-text">Visualizar imagens </h4>


              <table class="responsive-table striped">

        <thead>
          <tr>
            <th>Imagem principal</th>
            <th>Imagem</th>
            <th>Imagem</th>
            <th>Imagem</th>
            <th>Imagem</th>

          </tr>
        </thead>

        <tbody>

          <tr>
            <td> <img src="<?php echo $dados['foto_principal']?>" class="imgtabela materialboxed"> </td>
            <td> <img src="<?php echo $dados['foto1']?>" class="imgtabela materialboxed"> </td>
            <td> <img src="<?php echo $dados['foto2']?>" class="imgtabela materialboxed"> </td>
            <td> <img src="<?php echo $dados['foto3']?>" class="imgtabela materialboxed"> </td>
            <td> <img src="<?php echo $dados['foto4']?>" class="imgtabela materialboxed"> </td>
            <td><a href="#modalimagem" class="btn-floating orange modal-trigger"><i class="material-icons ">edit</i></a></td>
          </tr>
          </tbody>
      </table>


               

            </div>

          </div>




     


    


      


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

  

    <div id="modalimagem" class="modal">
    <div class="modal-content">
     
      <div class="row cor_fundo_padrao"><h4 class="light center white-text">Alterar imagens da Casa</h4></div>
      <form  class="col s12" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">

      <div class="row">
         <div class="file-field input-field col s12">
              <div class="btn orange">
                <span>Foto</span>
              <input type="file" name="path1">
              </div>
             
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" required>
              </div> 
        </div>

        <div class="file-field input-field col s12">
              <div class="btn orange">
                <span>Foto </span>
              <input type="file" name="path2">
              </div>
             
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" required >
              </div> 
        </div>

        <div class="file-field input-field col s12">
              <div class="btn orange">
                <span>Foto </span>
              <input type="file" name="path3" >
              </div>
             
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" required>
              </div> 
        </div>


        <div class="file-field input-field col s12">
              <div class="btn orange">
                <span>Foto</span>
              <input type="file" name="path4">
              </div>
             
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" required>
              </div> 
        </div>

        <div class="file-field input-field col s12">
              <div class="btn orange">
                <span>Foto</span>
              <input type="file" name="path5">
              </div>
             
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" required>
              </div> 
        </div>

        <div class="input-field col s6">
          <input  type="hidden" class="validate" name="token">
        </div>

      </div>
      <div class="right footerbutom">
          <button name="btnSave" type="submit" class="waves-effect waves-green  btn blue">registar</button>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="modal-close modal-action waves-effect waves-green btn red">Sair</a>


      </div>
      
    </form>
     


    </div>
  </div>







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