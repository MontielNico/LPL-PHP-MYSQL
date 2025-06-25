<?php

$ciudades = [
    "Argentina" => ["Buenos Aires", "Comodoro Rivadavia", "Trelew"],
    "Francia" => ["París", "Marsella", "Lyon"],
    "Italia" => ["Roma", "Milán", "Nápoles"]
];

if(isset($_GET['valor'])){
    $pais = $_GET['valor'];

    if(array_key_exists($pais, $ciudades)){
        echo "<ul>";
        foreach($ciudades[$pais] as $ciudad){
            echo "<li>$ciudad</li>";
        }
        echo "</ul>";
    } else {
        echo "No hay ciudades";
    }
} else {
    echo "Parametro no recibido";
}
?>