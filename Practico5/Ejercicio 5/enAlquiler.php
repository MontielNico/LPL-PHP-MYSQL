<?php

$conn = new mysqli("localhost", "root", "", "inmobiliaria");

if ($conn->connect_error) {
    echo "Error al conectar " . $conn->connect_error;
}

$sql = "SELECT i.tipoInmueble, i.domicilio, o.FechaInicio, o.importe FROM inmueble i INNER JOIN operacion o ON i.idInmueble = o.idInmueble WHERE o.tipoOperacion like 'Alquiler' LIMIT 0,30";

$resultado = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Inmuebles en Alquiler</h1>
    <?php
    if ($resultado->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Tipo Inmueble</th><th>Domicilio</th><th>Fecha Inicio</th><th>Importe</th></tr>";

        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['tipoInmueble'] . "</td>";
            echo "<td>" . $fila['domicilio'] . "</td>";
            echo "<td>" . $fila['FechaInicio'] . "</td>";
            echo "<td>" . $fila['importe'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        die("No hubo resultados");
    }
    ?>
</body>

</html>