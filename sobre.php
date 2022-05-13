<?php
session_start();






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
		  <!--<link rel="stylesheet" href="css/materialize.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
		<link rel="stylesheet" href="css/custom.css">
	 
	 <!--Icon da barra de titulo-->
		   <link rel="icon" href="img/site1.png">
	<title>Sobre Nós</title>

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
              <a href="<?php echo $_SERVER['PHP_SELF'];?>"><img src="img/site2.png" alt="Lusonay Imobiliaria" class="logo_img"></a> 
                <ul class="right light hide-on-med-and-down">
                    <li><a href="index.php" >Home</a></li>
                    <li><a href="indexTerreno.php" >Terrenos</a></li>
                    <li><a href="carro.php">Veículos</a></li>
                    <li><a href="sobre.php" class="ativo">Sobre nós</a></li>
                    <li><a href="login.php">Área restrita</a></li>
                </ul>
                <a href="#" data-activates="menu-mobile" class="button-collapse right"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        </div>
        <div class="row  nav-color navdistancia"></div>
    </header>



    <section class="home_ ">

      <div class="card-panel _container">

        <div class="row">
        <h3 class="center blue-text titulosobre">LUSONAY IMOBILIÁRIA</h3>
        <p class="light paragrafo">
          <strong>A Lusonay Imobliária </strong>, é uma empresa de direito Angolano cuja a actividade principal compreende:  
        </p>

          <li><strong>Intermediação de compra e venda de Imóveis</strong></li>
          <li><strong>Intermediação de compra e venda de Viaturas</strong></li>
          <li><strong>Gestão de Mercados informais</strong></li>
        <p>Legalização de Imóveis: </p>
        <li><strong>Direito de superficil</strong></li>
        <li><strong>Registo Predial</strong></li>
        <li><strong>Desanexação do prédio rústico</strong></li>
        
        <p class="light paragrafo">
          A sua sede está situada na rua direita da rotunda da Fubu, 
          no Bairro Dangereux, casa nº 100 quarteirão AB, Distrito Urbano de Camama, 
          Município de Talatona, Luanda.
        </p>

        <p class="light paragrafo">
         <strong> Estamos disponivel para qualquer proposta ou negociação.</strong>
        </p>


         <div class="row cor_fundo_padrao missao-visao white-text">
      <div class="container">
        <article class="item col s12 m4 center ">
          <span class="icon"><i class="material-icons medium">directions_run</i></span>
          <h3 class="light sobreh">Missão</h3>
          <p class="light texto paragrafo">
            Crescer em todas as áreas de forma sustentada, optimizando a nossa performance em termos de qualidade. Criar valor e contribuir para o desenvolvimento social e económico de Angola.
          </p>
        </article>
<!-- Carousel na secção sobre-->
        <article class="item col s12 m4 center sobreh ">
          <span class="icon"><i class="material-icons medium">visibility</i></span>
          <h3 class="light">Visão</h3>
          <p class="light texto paragrafo">
            Ser uma referência na área de Imobiliária. Garantir a satisfação e confiança dos intervenientes
          </p>
        </article>

        <!-- Valores-->
        <article class="item col s12 m4 center sobreh ">
          <span class="icon"><i class="material-icons medium">grade</i></span>
          <h3 class="light">Valores</h3>
          <p class="light texto paragrafo">
          Garantir a satisfação impulsionada pelo servir com justiça, lealdade e dignidade.  
          Valores que nos movem:<br>
           •  Ambição <br>
           •  Inovação <br>
           • Integridade <br>
           • Credibilidade <br>
          </p>

        </article>


      </div>


        




      </div>


      </div>


        
      <div class="row home_">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.497584393671!2d13.212981514168037!3d-8.92621059413472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1a51f5ac9b5c84ab%3A0xfec698851ed2a694!2sLusonay%20Imobili%C3%A1ria!5e0!3m2!1spt-PT!2sao!4v1646901391252!5m2!1spt-PT!2sao" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>



      </div>



    </section>


	









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
                                <button class="view_data btn cor_fundo_padrao" type="button">Enviar</button>
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


	
   
    <!-- Footer-->

     <div id="modalcasa" class="modal">
    <div class="modal-content">
     
      <div class="row cor_fundo_padrao"><h4 class="light center white-text">Registo de casa</h4></div>
      <form  class="col s12" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">

      <div class="row">

        <div class="input-field col s6">
         
          <select name="tiponegocio">
             <option value="">Tipo de negocio</option>
            <option value="Vende-se">Vende-se</option>
            <option value="Arrenda-se">Arrenda-se</option>
          </select>

        </div>

   

     
        <div class="input-field col s6">
          <input id="tipologia" type="text" class="validate" name="tipologia" require>
          <label for="tipologia">Tipologia</label>
        </div>

          <div class="input-field col s6">
          <input id="wcs" type="text" class="validate" name="wcs" require>
          <label for="wcs">quantidade de wcs</label>
        </div>
    

        <div class="input-field col s6">
          <input id="mobilada" type="text" class="validate" name="mobilada" require>
          <label for="mobilada">Mobilada</label>
        </div>

        <div class="input-field col s6">
          <input id="preco" type="text" class="validate" name="preco" require>
          <label for="preco">Preco</label>
        </div>

        <div class="input-field col s6">
         
          <select name="estado">
             <option value="">Estado</option>
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
          <input id="desc_interior" type="text" class="validate" name="desc_interior" >
          <label for="desc_interior">descrição interior</label>
        </div>

         <div class="input-field col s12">
          <input id="desc_exterior" type="text" class="validate" name="desc_exterior" >
          <label for="desc_exterior">descrição exterior</label>
        </div>

         <div class="input-field col s6">
          <input id="pais" type="text" class="validate" name="pais" require>
          <label for="pais">País</label>
        </div>
        <div class="input-field col s6">
          <input id="regiao" type="text" class="validate" name="regiao" require>
          <label for="regiao">Região</label>
        </div>

        <div class="input-field col s6">
          <input id="loca" type="text" class="validate" name="localidade" require>
          <label for="local">Localidade</label>
        </div>

         <div class="input-field col s6">
          <input id="municipio" type="text" class="validate" name="municipio" require>
          <label for="municipio">Municipio</label>
        </div>


         <div class="input-field col s6">
          <input id="telefone" type="tel" class="validate" name="telefone" >
          <label for="telefone">Telefone</label>
        </div>

         <div class="input-field col s6">
          <input id="email" type="email" class="validate" name="email" >
          <label for="email">Email</label>
        </div>

         <div class="file-field input-field col s12">
              <div class="btn orange">
                <span>Foto</span>
              <input type="file" name="path1">
              </div>
             
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" >
              </div> 
        </div>

        <div class="file-field input-field col s12">
              <div class="btn orange">
                <span>Foto </span>
              <input type="file" name="path2">
              </div>
             
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text"  >
              </div> 
        </div>

        <div class="file-field input-field col s12">
              <div class="btn orange">
                <span>Foto </span>
              <input type="file" name="path3">
              </div>
             
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" >
              </div> 
        </div>


        <div class="file-field input-field col s12">
              <div class="btn orange">
                <span>Foto</span>
              <input type="file" name="path4">
              </div>
             
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" >
              </div> 
        </div>

        <div class="file-field input-field col s12">
              <div class="btn orange">
                <span>Foto</span>
              <input type="file" name="path5">
              </div>
             
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div> 
        </div>

        <div class="input-field col s6">
          <input  type="hidden" class="validate" name="token" value="<?php echo $_SESSION['_token'];?>">
        </div>

      </div>
      <div class="right footerbutom">
          <button name="btnSave" type="submit" class="waves-effect waves-green  btn blue">registar</button>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="modal-close modal-action waves-effect waves-green btn red">Sair</a>


      </div>
      
    </form>
     


    </div>
  </div>





   <div id="modalcasaalt" class="modal modalaviso">

     

    
  </div>

   <div id="modalteste" class="modal">
    <div class="modal-content">
    
    </div>
  </div>
















   
	

	<!--  jquery-->
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<!--  javascript-->
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->
 	 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <!--<script src="js/materialize.js"></script>-->
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
         // alert(retorna);
          //carregando modal
          //M.toast({html: 'visualizado'},3000 );// codigo para executal o toast no materialize
       

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
          
        

        });
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