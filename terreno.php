<?php
session_start();

if (!isset($_SESSION['logado'])) {

header("Location: index.php");

}
require_once'dao/terrenoDao.php';
include_once('dao/localizacaoDao.php');
include_once('dao/imagemDao.php');
include_once('modelo/uploadfile.php');
include_once('seguranca/validacao.php');
include_once('modelo/util.php');

$chek=false;
$cDao=new TerrenoDao();
$t=new Terreno();
$l=new Localizacao();
$ldao=new LocalizacaoDao();
$im=new Imagem();
$up=new Upload();
$imgdao=new ImagemDao();
$val=new Validacao();
$util=new Util();

  $mensagem=array();
  $erros=array();

  


if (isset($_POST['btnSave'])) {
  //localizacao
  //var_dump($_FILES);
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

  $codlocalizacao=$ldao->inserir($l);
  //imagem
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

    $codimagem=$imgdao->inserir($im);
   // $codimagem=1;
    //$codlocalizacao=1;

  //terreno
    $preco=$val->validarEntrada($_POST['preco']);
  $t->setPreco($util->moeda($preco));
  $t->setTipo_negocio($val->validarEntrada($_POST['tiponegocio']));
  $t->setDesc_interior($val->validarEntrada($_POST['desc_interior']));
  $t->setDesc_exterior($val->validarEntrada($_POST['desc_exterior']));
  $t->setTelefone($val->validarEntrada($_POST['telefone']));
  $t->setEmail($val->validarEntrada($_POST['email']));
  $t->setDimensao($val->validarEntrada($_POST['dimensao']));
  $t->setPrioridade($val->validarEntrada($_POST['prioridade']));


  if ( $codlocalizacao==0) {
    $erros[]="<li>Erro ao inserir a localização, por favor verifique os dados </li>";
  }elseif ($codimagem==0) {
   $erros[]="<li>Erro ao inserir as imagens, por favor verifique os dados </li>";
  }else{
    $t->setCodigo_local($codlocalizacao);
    $t->setCodigo_imagem( $codimagem);
    $date=date('y-m-d');
    $t->setData_registo($date);
  
        if ($cDao->inserir($t)) {
     
      $mensagem[]="<li>Terreno registada com sucesso </li>";
    }else{
       $erros[]="<li>Erro ao registar porfavor verifique os dados </li>";
    }

  }


}
}


}



if (isset($_POST['btndelete'])) {
  $codigocasa=$val->filtrovalidateCodigo('codcasa');
  $dados=$cDao->buscarDados($codigocasa);
  
  $ldao->excluir($dados['cod_local']);//excluindo a localização 
  //eliminando as imagens do servidor
  unlink($dados['foto_principal']);
  unlink($dados['foto1']);
  unlink($dados['foto2']);
  unlink($dados['foto3']);
  unlink($dados['foto4']);
  //echo $dados['foto3'];
   if ($cDao->excluir($codigocasa)) {
       $imgdao->excluir($dados['cod_imagem_fk']);
       $mensagem[]="<li>Registo excluido com sucesso </li>";
    }else{
       $erros[]="<li>Erro ao exluir o registo </li>";

    }
 
}

//excluir o registro da casa
if (isset($_POST['btn_delete_terreno'])) {
  $codigoterreno=$val->filtrovalidateCodigo('codterreno');
  $dados=$cDao->buscarDados($codigoterreno);

  $ldao->excluir($dados['cod_local_fk']);//excluindo a localização 
  //eliminando as imagens do servidor
  unlink($dados['foto_principal']);
  unlink($dados['foto1']);
  unlink($dados['foto2']);
  unlink($dados['foto3']);
  unlink($dados['foto4']);
  //echo $dados['foto3'];
   if ($cDao->excluir($codigoterreno)) {
       $imgdao->excluir($dados['cod_imagem_fk']);
       $mensagem[]="<li>Registo excluido com sucesso </li>";
    }else{
       $erros[]="<li>Erro ao exluir o registo </li>";

    }
 
}

if (isset($_POST['btnSearch'])) {

if ($_SESSION['_token']==$_POST['token']) {
  
  if (empty($_POST['codigoterreno'])) {
    $erros[]="<li>por favor digite um codigo no campo de buscas</li>";
  }else{
    $codigocasa=$val->filtrovalidateCodigo('codigoterreno');
    if (empty($cDao->pesquisar($codigocasa))) {
     $chek=false;
     $erros[]="<li>Registo não encontrado</li>";
    }else{
    $chek=true;
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
                    <li><a href="user.php" class="botao">Usuarios</a></li>
                    <li><a class="hide-menu" href="admin.php">Casa</a></li>
                    <li><a class="hide-menu" href="terreno.php">Terrenos</a></li>
                    <li><a class="hide-menu" href="#cursos">Veículos</a></li>


        </ul>

        <div class="navbar-fixed ">
        <nav class="navbar z-depth-0" >
            <div class="nav-wrapper container black-text">
                <h1 class="logo_text">Try Code-formação & tecnologia</h1>
                
                <ul class="right light hide-on-med-and-down">
                    <li><a class="hide-menu" href="index.php">Inicio</a></li>
                    <li><a class="hide-menu" href="user.php">Usuário</a></li>
                    <li><a class="hide-menu" href="admin.php">Casa</a></li>
                    <li><a class="hide-menu ativo" href="terreno.php">Terrenos</a></li>
                    <li><a class="hide-menu" href="veiculo.php">Veículos</a></li>
                </ul>
                <a href="#" data-activates="menu-mobile" class="button-collapse right"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        </div>
        <div class="row  nav-color navdistancia"></div>
    </header>



    <section class="principal ">


        <div class="card-panel margem_card">

          <div class="row">
            <div class="right">
              <form  method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="input-field col s6">
                <input id="codigocasa" type="search" class="validate" name="codigoterreno" required>
                <input  type="hidden" class="validate" name="token" value="<?php echo $_SESSION['_token'];?>">
                <label for="codigocasa">Codigo</label>
              </div>
               <button name="btnSearch" type="submit" class="waves-effect btn green col s6 btnSerch"><i class="material-icons ">search</i></button>
              </form>
            </div>
          </div>

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



      ?>

                <h4 class="center blue-text">Registro de Terrenos</h4>

            <div class="row ">
                <a href="#modalcasa" class="btn blue modal-trigger">Registar</a>
            
            </div>

            <table class="responsive-table striped ">

                <thead>
                    <tr>
                        <th>Tipo de negócio</th>
                        <th>Dimensão</th>
                        <th>Preço</th>
                        <th>Descrição interior</th>
                        <th>Descrição Exterior</th>
                        <th>País</th>
                        <th>Região</th>
                        <th>Localidade</th>
                        <th>Municipio</th>
                        <th>Ações</th>

                    </tr>
                </thead>

                <tbody>
          <?php 
           if ($chek) {
              $dados=$cDao->pesquisar($codigocasa);
            }else{
              $dados=$cDao->listar();
          }
        

          if (!empty($dados)) {
            # code...
          
              foreach ( $dados as $te) {
            # code...
          

           ?>
                    <tr>
                        <td><?php echo $te['tipo_de_negocio']; ?></td>
                        <td><?php echo $te['dimensao']; ?></td>
                       <td><?php echo "AO".number_format($te['preco'], 2,",",".");?></td>
                        <td><?php echo $te['desc_interior'] ?></td>
                        <td><?php echo $te['desc_exterior']?></td>
                        <td><?php echo $te['pais']?></td>
                       <td><?php echo $te['regiao']?></td>
                        <td><?php echo $te['localidade']?></td>
                        <td><?php echo $te['municipio']?></td>
                        <td><a href="altterreno.php?id_terreno=<?php echo $te['cod_terreno']; ?>" class="btn-floating orange"><i class="material-icons ">edit</i></a></td>
            <td><a href="imgcasa.php?id_img=<?php echo $te['cod_imagem_fk']; ?>" class="btn-floating green" id="<?php echo $te['cod_imagem_fk'];?>"><i class="material-icons ">image</i></a></td>
            <td> <button type="button" class="btn-floating red view_data" id="<?php echo $te['cod_terreno'];?>"> <i class="material-icons "> delete </i> </button> </td>
                


                    </tr>
          <?php
        }
      }
        

          ?>

                </tbody>



            </table>


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


	
   
    <!-- Footer-->

     <div id="modalcasa" class="modal">
    <div class="modal-content">
     
      <div class="row cor_fundo_padrao"><h4 class="light center white-text">Registo de Terrenos</h4></div>
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
          <input id="dimensao" type="text" class="validate" name="dimensao" required>
          <label for="dimensao">Dimensão</label>
        </div>


        <div class="input-field col s6">
          <input id="preco" type="text" class="validate" name="preco" require>
          <label for="preco">Preco</label>
        </div>


         <div class="input-field col s6">
         
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





   <div id="modalcasaalt" class="modal modalaviso">

     

    
  </div>
















   
	

	<!--  jquery-->
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <script type"text/javascript" src="js/jquery.mask.js"></script>
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

       //mascaras com jmask
       $('#telefone').mask('(+244) 000-000-000 (+244) 000-000-000');
       //$('#data').mask('00/00/0000');
       $('#preco').mask('#.##0,00',{reverse: true});

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
      var id_terreno=$(this).attr("id");
      //verificar se o valor esta na variavel
      
      if (id_terreno !== '') {
        //alert(id_casa);
        var dados={
          id_terreno: id_terreno
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
       

      };
    });


      
	
 	</script>
          

</body>
</html>