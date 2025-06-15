<?php

include_once('calculadora.class.php');

$calculadora = new calculadora();

echo $calculadora->getA() . " <br>";
echo $calculadora->getFormaBinomica() . "<br>";
echo $calculadora->getModulo();

?>