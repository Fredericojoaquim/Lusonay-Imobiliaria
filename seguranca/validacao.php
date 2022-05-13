<?php

class Validacao{



public function verificarSenha($senha,$confsenha){
	if (strcmp($senha,$confsenha)==0) {
		return true;
	}
	return false;
}


//funcao que valida o input contra xss e sql injection
public function validarEntrada($input){
	$texto=strip_tags($input);
	$in=htmlspecialchars($texto);
	return $in;
}


public function isEmpty($input){
   return empty($input);
}

public function filtrovalidateId($input){

	return filter_input(INPUT_GET, $input, FILTER_VALIDATE_INT);
}


public function filtrovalidateCodigo($input){

	return filter_input(INPUT_POST, $input, FILTER_VALIDATE_INT);
}


}



?>