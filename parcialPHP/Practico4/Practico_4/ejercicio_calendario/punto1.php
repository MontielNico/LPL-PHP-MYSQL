<?php

$numeros_pares = array();
$numeros_impares = array();


for ($i=0; $i < 1000 ; $i++) { 
    if($i % 2 == 0){
        array_push($numeros_pares,$i);
    } else {
        array_push($numeros_impares,$i);
    }
}

echo "numeros pares: ";
foreach ($numeros_pares as  $numero) {
    echo " " . $numero;
}

echo "<br>";

echo "numeros impares: ";
foreach ($numeros_impares as  $numero) {
    echo " " . $numero;
}




?>