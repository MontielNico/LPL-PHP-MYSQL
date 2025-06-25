<?php

$conn = new mysqli("localhost", "root", "", "inmobiliaria");

if($conn->connect_error){
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM inmueble LIMIT 0, 300";

$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmbuebles MYSQL</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Tabla Inmuebles</h1>
    <?php
    if($resultado->num_rows > 0){
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Tipo</th><th>Domicilio</th><th>Cantidad Dormitorios</th><th>Mejoras</th><th>Cantidad Baños</th></tr>";
    
    while($fila = $resultado->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $fila['idInmueble'] . "</td>";
        echo "<td>" . $fila['tipoInmueble'] . "</td>";
        echo "<td>" . $fila['domicilio'] . "</td>";
        echo "<td>" . $fila['cantidadDormitorios'] . "</td>";
        echo "<td>" . $fila['mejoras'] . "</td>";
        echo "<td>" . $fila['cantidadBanios'] . "</td>";
        echo "<td><a href='modificar.php?id=" .$fila['idInmueble']."'><button>Modificar</button></a></td>";
        echo "<td><a href='eliminar.php?id=" .$fila['idInmueble']."'><button>Eliminar</button></a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No hay inmbuebles";
}
    ?>
    
</body>
</html>

<?php
$conn->close();

?>