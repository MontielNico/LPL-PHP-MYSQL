<?php
$num1 = 3;
$num2 = 7;
$resultado = 1;
$resto = 0;

if($num1 > $num2){

    for ($i=0; $i < $num2 ; $i++) { 
        $resultado *= $num1;
    }
    echo "resultado: " . $resultado;
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