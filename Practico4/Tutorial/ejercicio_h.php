<?php
$arreglo = array();
$sumatoria = 0;

for ($i=0; $i < 10 ; $i++) { 
    $arreglo[$i] = rand(1,10);
}


echo "<pre>";
print_r($arreglo);
echo "</pre> <br>";

for ($i=0; $i < count($arreglo) ; $i++) { 
    $sumatoria += $arreglo[$i];
}

/*  cantidad y suma de elementos */
echo "cantidad de elementos = " . count($arreglo) . " sumatoria = " . $sumatoria . "<br>";

/*  primer y ultimo elemento del arreglo */
$primero = array_shift($arreglo);
$ultimo = array_pop($arreglo);
echo "primer elemento = " . $primero . " ultimo elemento = " . $ultimo . "<br>";

/*  menor y mayor */
array_unshift($arreglo,$primero);
array_push($arreglo,$ultimo);
sort($arreglo);
print_r($arreglo);

/*  si el numero 5 */
if(in_array(5,$arreglo)){
    echo "<br> se ecuentra el numero 5!";
} else{
    echo "<br> no se encuentra el numero 5...";
}

/*  el promedio de los valores */

echo "<br>el promedio de los valores es = " . ($sumatoria / count($arreglo));

/*  arreglo ordenado de menor a mayor */
$menor = $primero;
$mayor = 1;

for ($i=0; $i < count($arreglo) ; $i++) { 
    if($arreglo[$i] <= $menor){
        $menor = $arreglo[$i];
    }
    if ($arreglo[$i] >= $mayor) {
        $mayor = $arreglo[$i];
    }
}

echo "<br> menor elemento = " . $menor . "  mayor elemento = " . $mayor;
?>