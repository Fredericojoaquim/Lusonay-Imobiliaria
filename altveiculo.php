<?php
session_start();

if (!isset($_SESSION['logado'])) {

header("Location: index.php");

}

require_once'dao/veiculoDao.php';
include_once('dao/localizacaoDao.php');
include_once('dao/imagemDao.php');
include_once('modelo/uploadfile.php');
include_once('seguranca/validacao.php');

$t=new Veiculo();
$cDao=new VeiculoDao();
$l=new Localizacao();
$ldao=new LocalizacaoDao();
$im=new Imagem();
$up=new Upload();
$imgdao=new ImagemDao();
$val=new Validacao();

  $mensagem=array();
  $erros=array();

 
  //var_dump($dados);


if (isset($_GET['id_veiculo'])) {
   $codigo=$val->filtrovalidateId('id_veiculo');
  $dados=$cDao-> buscarDados($codigo);
	
}

if (isset($_POST['btnSave'])) {

  $codigo=$val->filtrovalidateCodigo('codigo');


  if (empty($_POST['pais'])) {
     $erros[]="<li>O campo País é um campo obrigatório</li>";
  }elseif (empty($_POST['regiao'])) {
     $erros[]="<li>O campo Região é um campo obrigatório</li>";
  }elseif (empty($_POST['municipio'])) {
    $erros[]="<li>O campo Municipio  é um campo obrigatório</li>";
  }elseif (empty($_POST['localidade'])) {
    $erros[]="<li>O campo Localidade  é um campo obrigatório</li>";
  }elseif (empty($_POST['preco'])) {
    $erros[]="<li>O campo Preço  é um campo obrigatório</li>";
  }elseif (empty($_POST['tiponegocio'])) {
     $erros[]="<li>O campo Tipo de Negocio  é um campo obrigatório</li>";
  }elseif (empty($_POST['cor'])) {
    $erros[]="<li>O campo Cor  é um campo obrigatório</li>";
  }elseif (empty($_POST['marca'])) {
   $erros[]="<li>O campo Marca  é um campo obrigatório</li>";
  }elseif (empty($_POST['modelo'])) {
    $erros[]="<li>O campo  Modelo  é um campo obrigatório</li>";
  }elseif (empty($_POST['matricula'])) {
    $erros[]="<li>O campo matricula é um campo obrigatório</li>";
  }elseif (empty($_POST['estado'])) {
    $erros[]="<li>O campo estado  é um campo obrigatório</li>";
  }elseif (empty($_POST['prioridade'])) {
    $erros[]="<li>O campo prioridade  é um campo obrigatório</li>";
  }elseif (empty($_POST['preco'])) {
    $erros[]="<li>O campo preço  é um campo obrigatório</li>";
  }elseif (empty($_POST['airbag'])) {
    $erros[]="<li>O campo Airbag é um campo obrigatório</li>";
  }elseif (empty($_POST['arcondicionado'])) {
    $erros[]="<li>O campo Arcondicionado é um campo obrigatório</li>";
  }elseif (empty($_POST['combustivel'])) {
   $erros[]="<li>O campo Combustivel é um campo obrigatório</li>";
  }elseif (empty($_POST['elem_seguranca'])) {
    $erros[]="<li>O campo elemento de segurança é um campo obrigatório</li>";
  }elseif (empty($_POST['caixavelocidade'])) {
   $erros[]="<li>O campo Caixa de velocidade é um campo obrigatório</li>";
  }elseif (empty($_POST['kilometragem'])) {
   $erros[]="<li>O campo Kilometragem é um campo obrigatório</li>";
  }elseif (empty($_POST['equip_interior'])) {
    $erros[]="<li>O campo equipamento interior  é um campo obrigatório</li>";
  }elseif (empty($_POST['codigo'])) {
     $erros[]="<li>Erro na submissão do formulário</li>";
  }else{

  $l->setPais($val->validarEntrada($_POST['pais']));
  $l->setRegiao($val->validarEntrada($_POST['regiao']));
  $l->setMunicipio($val->validarEntrada($_POST['municipio']));
  $l->setLocalidade($val->validarEntrada($_POST['localidade']));
  $l->setCodigo($val->filtrovalidateCodigo('codigoloc'));

  if (!$ldao->alterar($l)) {
    $erros[]="<li>Erro ao alterar os dados por favor verifique </li>";
  }else{

    //veiculo
  $t->setPreco($val->validarEntrada($_POST['preco']));
  $t->setTiponegocio($val->validarEntrada($_POST['tiponegocio']));
  $t->setEstado($val->validarEntrada($_POST['estado']));
  $t->setCor($val->validarEntrada($_POST['cor']));
  $t->setMarca($val->validarEntrada($_POST['marca']));
  $t->setModelo($val->validarEntrada($_POST['modelo']));
  $t->setMatricula($val->validarEntrada($_POST['matricula']));
  $t->setPrioridade($val->validarEntrada($_POST['prioridade']));
  $t->setAirbag($val->validarEntrada($_POST['airbag']));
  $t->setArcondicionado($val->validarEntrada($_POST['arcondicionado']));
  $t->setEle_seguranca($val->validarEntrada($_POST['elem_seguranca']));
  $t->setKilometragem($val->validarEntrada($_POST['kilometragem']));
  $t->setCaixavelocidade($val->validarEntrada($_POST['caixavelocidade']));
  $t->setCombustivel($val->validarEntrada($_POST['combustivel']));
  $t->setEquipam_interior($val->validarEntrada($_POST['equip_interior']));
  $t->setTelefone($val->validarEntrada($_POST['telefone']));
  $t->setEmail($val->validarEntrada($_POST['email']));

  $t->setCodigo($val->filtrovalidateCodigo('codigo'));

        if ($_SESSION['_token']==$_POST['token']) {
         
            if ($cDao->alterar($t)) {

              $mensagem[]="<li>Registo de viatura alterado com sucesso </li>";
            }else{
               $erros[]="<li>Erro ao Alterar o registo porfavor verifique os dados </li>";
            }
       }else{
        $erros[]="<li>Erro na submissão do formulário, porfavor tente mais tarde </li>";
       }

  
}
}


}

if (!(empty($mensagem) or empty($erro)) and (!isset($_GET['id_veiculo']) )) {
  header('Location: veiculo.php');
  
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
                    <li><a class="hide-menu" href="admin.php">Casa</a></li>
                    <li><a class="hide-menu" href="terreno.php">Terrenos</a></li>
                    <li><a class="hide-menu" href="veiculo.php">Veículos</a></li>


        </ul>

        <div class="navbar-fixed ">
        <nav class="navbar z-depth-0" >
            <div class="nav-wrapper container black-text">
                <h1 class="logo_text">Try Code-formação & tecnologia</h1>
                
                <ul class="right light hide-on-med-and-down">
                    <li><a class="hide-menu"href="index.php">Inicio</a></li>
                    <li><a class="hide-menu" href="admin.php">Casa</a></li>
                    <li><a class="hide-menu " href="terreno.php">Terrenos</a></li>
                   <li><a class="hide-menu ativo" href="veiculo.php">Veículos</a></li>
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
        $dados=$cDao-> buscarDados($codigo);
      }

       if (!empty($mensagem)) {
          foreach ($mensagem as $e) {
          echo '<div class="row container mensagem green white-text">'.$e.'</div>';
           }
        }else{

      ?>

        

      

          <div class="container">


            <div class="card-panel">


        <div class="row cor_fundo_padrao"><h4 class="light center white-text">Alterar Registo de Veiculo</h4></div>
        <form  class="col s12" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>"  enctype="multipart/form-data">

      <div class="row">

        <div class="input-field col s6">
         
          <select name="tiponegocio">
             <option value="<?php echo $dados['tipo_negocio'];?>"><?php echo $dados['tipo_negocio'];?></option>
            <option value="Vende-se">Vende-se</option>
            <option value="Arrenda-se">Aluga-se</option>
          </select>

        </div>

   

     
        <div class="input-field col s6">
          <input id="cor" type="text" class="validate" name="cor" value ="<?php echo $dados['cor'];?>"required>
          <label for="cor">Cor</label>
        </div>

          <div class="input-field col s6">
          <input id="marca" type="text" class="validate" name="marca" value="<?php echo $dados['marca'];?>" required>
          <label for="marca">marca</label>
        </div>
    

        <div class="input-field col s6">
          <input id="modelo" type="text" class="validate" value="<?php echo $dados['modelo'];?>" name="modelo" required>
          <label for="modelo">modelo</label>
        </div>

        <div class="input-field col s6">
          <input id="matricula" type="text" class="validate" value="<?php echo $dados['matricula'];?>"name="matricula" required>
          <label for="matricula">Matricula</label>
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
             <option value="<?php echo $dados['prioridade'];?>"><?php if ($dados['prioridade']==0) {echo 'Normal';}else{echo 'Destaque';}?></option>
            <option value="0">Normal</option>
            <option value="1">Destaque</option>
          </select>

        </div>


        <div class="input-field col s6">
          <input id="preco" type="text" class="validate" value="<?php echo $dados['preco'];?>" name="preco" required>
          <label for="preco">Preço</label>
        </div>


        <div class="input-field col s6">
         
          <select name="airbag">
             <option value="<?php echo $dados['airbag'];?>"><?php echo $dados['airbag'];?></option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
          </select>

        </div>

        <div class="input-field col s6">
         
          <select name="arcondicionado">
             <option value="<?php echo $dados['arcondicionado'];?>"><?php echo $dados['arcondicionado'];?></option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
          </select>

        </div>


         <div class="input-field col s6">
         
          <select name="combustivel">
             <option value="<?php echo $dados['comustivel'];?>"><?php echo $dados['comustivel'];?></option>
            <option value="Gasolina">Gasolina</option>
            <option value="Gasóleo">Gasóleo</option>
          </select>

        </div>


       

        <div class="input-field col s12">
          <input id="elem_seguranca" type="text" value="<?php echo $dados['ele_seguranca'];?>"class="validate" name="elem_seguranca" >
          <label for="elem_seguranca">Elemento de seguraça</label>
        </div>

         <div class="input-field col s6">
         
          <select name="caixavelocidade">
             <option value="<?php echo $dados['caixa_velocidade'];?>"><?php echo $dados['caixa_velocidade'];?></option>
            <option value="Manual">Manual</option>
            <option value="Automática">Automática</option>
          </select>

        </div>

         <div class="input-field col s6">
          <input id="kilometragem" type="text" class="validate" value="<?php echo $dados['kilometragem'];?>" name="kilometragem" >
          <label for="kilometragem">kilometragem</label>
        </div>

      
         <div class="input-field col s12">
          <input id="equip_interior" type="text" value="<?php echo $dados['equipam_interior'];?>" class="validate" name="equip_interior" >
          <label for="equip_interior">Equipamento interior</label>
        </div>


         <div class="input-field col s6">
          <input id="pais" type="text" class="validate" name="pais" value="<?php echo $dados['pais'];?>" required>
          <label for="pais">País</label>
        </div>
        <div class="input-field col s6">
          <input id="regiao" type="text" class="validate" name="regiao" value="<?php echo $dados['regiao'];?>" required>
          <label for="regiao">Região</label>
        </div>

        <div class="input-field col s6">
          <input id="loca" type="text" class="validate" name="localidade" value="<?php echo $dados['localidade'];?>" required>
          <label for="local">Localidade</label>
        </div>

         <div class="input-field col s6">
          <input id="municipio" type="text" class="validate" value="<?php echo $dados['municipio'];?>" name="municipio" require>
          <label for="municipio">Municipio</label>
        </div>


         <div class="input-field col s6">
          <input id="telefone" type="tel" value="<?php echo $dados['telefone'];?>" class="validate" name="telefone" >
          <label for="telefone">Telefone</label>
        </div>

         <div class="input-field col s6">
          <input id="email" type="email" class="validate" value="<?php echo $dados['email'];?>" name="email" >
          <label for="email">Email</label>
        </div>
         <div class="right btnaltcasa">
          <input  type="hidden" class="validate" name="token" value="<?php echo $_SESSION['_token'];?>">
          <input  type="hidden" class="validate" name="codigo" value="<?php echo $dados['cod_veiculo'] ;?>">
         <button name="btnSave" type="submit" class="waves-effect waves-green btn blue">alterar</button>
        <a href="<?php echo $_SERVER['PHP_SELF'];?>" class=" waves-effect waves-green btn red">Sair</a>
         </div>
      </div>
      
    </form>
     





            </div>
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