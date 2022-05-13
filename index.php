<?php
session_start();
$_SESSION['_token']=hash('sha512', rand(100,1000));//crf ataque

require_once'dao/casaDao.php';
require_once'dao/terrenoDao.php';
$tDao=new TerrenoDao();
$cDao=new CasaDao();

$casa=$cDao->listar();
$te=$tDao->listar();
$total=$cDao->total();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!--Tags metas-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lusonay imóbiliar é uma empresa do direito angolano, prestando serviços de mediação de compra e venda de imóveis, compra e venda de viaturas, serviços de hipotéca e legalização de imóveis">
    <meta name="keywords" content="carro,carros, casa, casas, imóveis,terrenos, compra e venda deviaturas">
    <meta name="msvalidate.01" content="A788FE67753D71A2A43515F08C7991D5" />
    <meta name="rebots" content="index,fololw">
    <meta name="author" content="TryCode-formação e tecnologia">
    
    <!--Import Google Icon Font-->
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <!--fontawesome-->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--  materialize css-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
       <!-- <link rel="stylesheet" href="css/materialize.css">-->
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
                    <li><a class="hide-menu"href="index.php">Home</a></li>
                    <li><a class="hide-menu" href="indexTerreno.php" >Terrenos</a></li>
                    <li><a class="hide-menu" href="carro.php">Veículos</a></li>
                    <li><a class="hide-menu" href="sobre.php">Sobre nós</a></li>
                    <li><a class="hide-menu" href="login.php">Área restrita</a></li>
        </ul>

        <div class="navbar-fixed">
        <nav class="navbar z-depth-0" >
            <div class="nav-wrapper container ">
                <h1 class="logo_text">Lusonay Imobiliária</h1>
              <a href="<?php echo $_SERVER['PHP_SELF'];?>"><img src="img/site1.png" alt="Lusonay Imobiliaria" class="logo_img"></a> 
                <ul class="right light hide-on-med-and-down">
                    <li><a href="#home" class="ativo">Home</a></li>
                    <li><a href="indexTerreno.php" >Terrenos</a></li>
                    <li><a href="carro.php">Veículos</a></li>
                    <li><a href="sobre.php">Sobre nós</a></li>
                    <li><a href="login.php">Área restrita</a></li>
                </ul>
                <a href="#" data-activates="menu-mobile" class="button-collapse right"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        </div>
    </header>
    <!--  Home-->
    <!--<section class="home bloco scrollspy responsive-img" id="home">
    <!-- Espaço onde esta a animação da home-->
 <!---- </section> -->
 <section  class="home bloco scrollspy" id="home">
    <div class="row container baner">
        <div class="col s12 center margembaner container">
            <h2 class="white-text">A melhor imobiliária de Angola</h2>
            <p class="white-text light">Trazemos um novo conceito de negociação, baseado em transparencia, lealdade e muita responsabilidade,<br> navegue pelo nosso site e descubra as nossas novidades.</p>
            <div class="row botoes">
                <a class="btn-large blue " href="sobre.php">Sobre Nós</a>
                <a href="#contato" class="btn-large white btncontato">CONTACTOS</a>

            </div>

        </div>

    </div>



</section>
    
<section class="container">
    <div class="row">
    <h4 class="center blue-text darken-4">Nossos Imóveis</h4>
    </div>

  <div class="row">
    <?php
        if (!empty($casa)) {
           foreach ($casa as $c) {
               # code...
        

    ?>

    <div class="col s12 m6 l3 container">
        <div class="div-title">
          
                <span class=""> <h5 class="card-title"><?php echo $c['tipo_negocio']; ?></h5> </span>
            </div>

            <div class="card">

                <div class="card-image">
                     <img src="<?php echo $c['foto_principal']; ?>" class="img_card materialboxed">
                </div>
                <div class="card-content">
                 <p>Tipologia: <?php echo $c['tipologia']; ?></p>
                 <p>Estado: <?php echo $c['estado']; ?></p>
                 <p>Preço: <?php echo "KZ ".number_format($c['preco'], 2,",",".");?></p>
                 <p>Mobilada: <?php echo $c['mobilada']; ?></p>
                 <p>Região: <?php echo $c['regiao']; ?></p>
                  <div class="center divbtnSaibamais"><a href="casadetalhes.php?id_casa=<?php echo $c['cod_casa']; ?>" class="btn blue center btnsaibamais">saber mais...</a></div>
                 </div>
            </div>
    </div>
     <?php
      }
    }

   ?>
    <?php
   
   $res=$total/4;


   if (!strpos($res,".")) {
       # code...
    // echo $res;
   }else{
    $es= explode(".", $res);
    $num=$es[1];

   switch ($num) {
       case 25:
           # code...
           break;
        case 5:
            $i=0;
            while ($i<2) {
                # code...
            

              echo  
              '<div class="col  hide-on-med-and-down l3 container">

                    <div class="div-title">
          
                        <span class=""> <h5 class="card-title">Anuncie Aqui!</h5> </span>
                     </div>

                <div class="card">

                    <div class="card-image">
                         <img src="img/como-anunciar-na-internet.jpg" class="img_card materialboxed">
                    </div>
                    <div class="card-content">
                     <p class="light paragrafo alturalinha">Anuncie seus imóveis e viaturas no nosso portal, e ganha mais visibilidade ao seu negócio, entre em contacto e comece a publicitar aqui!!</p>
                     
                      <div class="center divbtnSaibamais"><a href="#contato" class="btn blue center btnsaibamais">Contacto</a></div>
                     </div>
                 </div>
            </div>';
    $i=$i+1;
    }
           

           break;
        case 75:
           echo  '<div class="col hide-on-med-and-down container">

        <div class="div-title">
          
                <span class=""> <h5 class="card-title">Anuncie Aqui!</h5> </span>
        </div>

        <div class="card">

                <div class="card-image">
                     <img src="img/como-anunciar-na-internet.jpg" class="img_card materialboxed">
                </div>
                <div class="card-content">
                 <p class="light paragrafo alturalinha">Anuncie seus imóveis e viaturas no nosso portal, e ganha mais visibilidade ao seu negócio, entre em contacto e comece a publicitar aqui!!</p>
                 
                  <div class="center divbtnSaibamais"><a href="#contato" class="btn blue center btnsaibamais">Contacto</a></div>
                 </div>
        </div>



    </div>';

           break;
       
       default:
           # code...
           break;
   }
}




   ?>

 </div>


  
</section>






<div class="center">
  <!--  <ul class="pagination" id="menu-mobile">
         <li class="waves-effects"><a class="" href=""><i class="material-icons ">chevron_left</i></a></li>
         <li class="active"><a class="" href="">1</a></li>
         <li class="disabled"><a class="" href="#">Total-22</a></li>
        <li class="waves-effects"><a class="" href=""><i class="material-icons ">chevron_right</i></a></li>         
    </ul> -->

</div>





<footer class="page-footer black">
    <div class="container scrollspy" id="contato">
        <div class="row">

            <div class="col s12 l4 ">
                <h4 class="center cor_titulo_padra titulo">NEWS LETTER</h4>
                <p class="center">fique por dentro das novidades e receba todos os dias em seu email as novidades do nosso site, ou simplesmente mostre ao mundo que você faz parte deste projecto sensacional</p>
                        <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="input-field search-wrapper white entrada_email">
                            <input  type="email" class="validate" id="email">
                             <label class="active center" for="email">digite seu email</label>
                            </div>
                            <div class="center sbmit" >
                                <button class="cor_fundo_padrao view_data btn cor_fundo_padrao" type="button">Enviar</button>
                            </div>
                        
                        </form> 
             </div>


             <div class="col s12 l4 center">
                <h4 class="center cor_titulo_padra titulo">CONTACTOS</h4>
                    <p class="light ">Bairro Dangereux-paragem do Muxicheiro municipio de Talatona</p>
                    <p class="light  texto contato_title">
                    (+244) 944 337 971<br>
                    (+244) 943 789 108<br>
                    (+244) 916 674 709<br>
                    (+244) 935 070 700<br>
                    Email: geral@lusonay.ao
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


    
   
    <!-- Footer-->















   
     

    <!--  jquery-->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!--  javascript-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <!--<script src="js/materialize.js"></script>-->
    <script >


     $(document).ready(function(){
        $('.slider').slider();
        
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
        var img=document.querySelector(".logo_img");

        if ($(window).scrollTop()>100) {
            $(".navbar").addClass("nav-color");
            img.setAttribute('src','img/site2.png');
        }else{
           $(".navbar").removeClass("nav-color");
             img.setAttribute('src','img/site1.png');
        }
     });


     //newsletter
      $(document).on('click','.view_data',function(){
        var email=document.querySelector("#email").value;
      
      
      //verificar se o valor esta na variavel
      
      if (email !== '') {
        //alert(id_casa);
        var dados={
          email: email
        };
        //alert(dados);

        $.post('dao/operacao.php', dados, function (retorna){
               // var conteudo=$('<p class="green">Enviado com sucesso</p>');
                Materialize.toast(retorna,3000,'rounded');
                document.querySelector("#email").value='';

        })
      

      }else{
         Materialize.toast('Por favor digite seu email',3000,'rounded');
      };
    });
    </script>
          

</body>
</html>