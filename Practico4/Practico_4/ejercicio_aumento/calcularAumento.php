<?php
include('empleado.class.php');

$listaEmpleados = array();

for ($i=0; $i < 5 ; $i++) { 
    $empleado = new empleado("empleado".$i,rand(100000,400000),rand(0,20));
    array_push($listaEmpleados,$empleado);
}

foreach ($listaEmpleados as $empleado) {
    $antiguedad = $empleado->getAntiguedad();
    if ($antiguedad <= 5) {
        $empleado->setPorcentaje(20);
    } elseif ($antiguedad <= 10) {
        $empleado->setPorcentaje(18);
    } elseif ($antiguedad <= 15) {
        $empleado->setPorcentaje(15);
    } else {
        $empleado->setPorcentaje(12);
    }
}

foreach ($listaEmpleados as $empleado) {
    $salario = $empleado->getSalario();
    if($salario <= 300000 && $salario >= 200000){
        $empleado->setPorcentaje(($empleado->getPorcentaje())/2);
    } else {
        $empleado->setPorcentaje(($empleado->getPorcentaje())/10);
    }
}

function calculaAumento($salario,$porcentaje){
    $resultado = $salario * (1+$porcentaje/100);
    return $resultado;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOOOOOODDD</title>
    <link rel="stylesheet" href="../css/calendario.css">
</head>
<body>
    <h1>AUMENTO EMPLEADOS</h1>
    <table>
        <tr>
            <th>Empleado</th>
            <th>Salario</th>
            <th>Antiguedad</th>
            <th>Aumento</th>
        </tr>
        <?php
        foreach ($listaEmpleados as $empleado) {
            $aumento = calculaAumento($empleado->getSalario(),$empleado->getPorcentaje());
            echo"<tr>
            <td>{$empleado->getNombre()}</td>
            <td>{$empleado->getSalario()}</td>
            <td>{$empleado->getAntiguedad()}</td>
            <td>$aumento</td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>

