<?php
$raza = $_GET['mascota'];
$cantidad = $_GET['cantidad'];
$bolsa = $_GET['tipoBolsa'];

function calculoBolsas($cantidad,$bolsa){
    $total = 0;

    switch ($bolsa) {
        case 1:
            if($cantidad <= 100){
                $total = 5;
            } else {
                $total = 7;
            }
            break;
        case 2:
            if($cantidad <= 200){
                $total = 4;
            } else {
                $total = 6;
            }
            break;
        case 3:
            if ($cantidad <= 300) {
                $total = 2;
            } else {
                $total = 3;
            }
            break;
        
        default:
            echo "error";
            break;
    }

    return $total;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo</title>
</head>
<body>
    <h1>Resultado del Calculo</h1>
    <?php
    echo "<p>Para el perro: " . $raza . "</p>";
    echo "<p>Cantidad de elemento: " . $cantidad . "</p>";
    echo "<p>Tipo de Bolsa seleccionada: " . $bolsa . "</p>";

    echo "<p> Hay que comprar  " . calculoBolsas($cantidad,$bolsa) . " bolsas de alimento </p>";
    
    ?>
</body>
</html>