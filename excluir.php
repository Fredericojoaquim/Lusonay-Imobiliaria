<?php


if (isset($_POST['id_casa'])) {
	
	$res='<div class="modal-content">
       <h4 class="light center red-text"><i class="material-icons ">warning</i>ATENÇÃO</h4>
      <p class="center">Tem certeza que deseja excluir este registo?</p>

      <div class="row center" id="altcasa">
        <form method="POST" action="admin.php"  >

        <div class="center">
          <input id="telefone" type="hidden" class="validate" value="'.$_POST['id_casa'].'" name="codterreno" >
           <button name="btndelete" type="submit" class="waves-effect waves-green  btn blue ">Sim</button>
        <a href="admin.php" class="modal-close modal-action waves-effect waves-green btn red ">Não</a>

        </div>
        
        </form>

      </div>

    </div>';
    echo $res;
   
}


if (isset($_POST['id_terreno'])) {
  
  $res='<div class="modal-content">
      <h4 class="light center red-text">ATENÇÃO</h4>
      <p class="center">Tem certeza que deseja excluir este registo?</p>

      <div class="row center" id="altcasa">
        <form method="POST" action="terreno.php"  >

        <div class="center">
          <input id="telefone" type="hidden" class="validate" value="'.$_POST['id_terreno'].'" name="codterreno" >
           <button name="btn_delete_terreno" type="submit" class="waves-effect waves-green  btn blue ">Sim</button>
        <a href="terreno.php" class="modal-close modal-action waves-effect waves-green btn red ">Não</a>

        </div>
        
        </form>

      </div>

    </div>';
    echo $res;
}



if (isset($_POST['id_veiculo'])) {
  
  $res='<div class="modal-content">
      <h4 class="light center red-text"><i class="material-icons ">warning</i>ATENÇÃO</h4>
      <p class="center">Tem certeza que deseja excluir este registo?</p>

      <div class="row center" id="altcasa">
        <form method="POST" action="veiculo.php"  >

        <div class="center">
          <input id="telefone" type="hidden" class="validate" value="'.$_POST['id_veiculo'].'" name="codveiculo" >
           <button name="btn_delete_veiculo" type="submit" class="waves-effect waves-green  btn blue ">Sim</button>
        <a href="terreno.php" class="modal-close modal-action waves-effect waves-green btn red ">Não</a>

        </div>
        
        </form>

      </div>

    </div>';
    echo $res;
}













?>