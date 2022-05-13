<?php

class Upload{



	public function formatofile($name){

		$formatosvalido=array("png","jpeg","jpg");
		$extensao=pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION);

		if(in_array($extensao, $formatosvalido)){
			return true;
		}
		return false;
	}


	public function uploadFile($name){

		$formatosvalido=array("png","jpeg","jpg");
		$extensao=pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION);

		if(in_array($extensao, $formatosvalido)){
			$pasta="fotos/";
			$temporario=$_FILES[$name]['tmp_name'];
			$novonome=uniqid().".$extensao";
			$caminho= $pasta.$novonome;
			if (move_uploaded_file($temporario,$caminho)) {
				return $caminho;
			}
		}
	
	}



	
}








?>