<?php
$num1 = 2;
$num2 = 10;
$resultado = 1;
$resto = 0;
$arreglo = array();

if($num1 < $num2){

    for ($i=0; $i < $num2 ; $i++) { 
        $resultado *= $num1;
        $arreglo[$i] = $resultado;
    }
    echo "resultado: " . $resultado ."<br>";
    echo "<pre>";
    print_r($arreglo);
    echo "</pre>";
} else {
    $resto = $num2;

    while($resto >= $num1){
        $resto = $resto - $num1;
        $resultado++;
    }

    echo "resultado: " . $resultado . "<br>";
    echo "resto: " . $resto;

}

?>