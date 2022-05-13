<?php

class Util{
	


	public function moeda($v){

		$source=array('.',',');
		$replace=array('','.');
		$valor=str_replace($source, $replace, $v);
		return $valor;
		
	}


	public function qtdLinha($total){

		$num=$total/4;
		if (!strpos($num,",")) {
			return $num;
		}else{
			return ceil($num);
		}

	}

	public function cardpublicitario(){
		
		$v='<div class="col  hide-on-med-and-down l3 container">

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
   	return $v;
	}


}








?>