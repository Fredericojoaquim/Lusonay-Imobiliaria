<?php

$num="1.75";
/*var_dump(strpos($num,","));

echo ceil($num);*/

$es= explode(".", $num);
var_dump($es);
$num= $es[1];
?>