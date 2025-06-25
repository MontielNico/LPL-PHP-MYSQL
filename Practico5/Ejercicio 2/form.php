<?php

//CONEXIÓN BDD
$conn = new mysqli("localhost", "root", "", "inmobiliaria");

if(isset($_POST['btnEnviar'])){
    $tipo = $_POST['tipoInmueble'];
    $domicilio = $_POST['domicilio'];
    $dormitorios = $_POST['cantidadDormitorios'];
    $observacion = $_POST['observacion'];
    $mejoras = $_POST['mejoras'];
    $cantidadBanios = $_POST['cantidadBanios'];

    $sql = "INSERT INTO inmueble (tipoInmueble, domicilio, cantidadDormitorios, mejoras, cantidadBanios, observacion) VALUES ('$tipo', '$domicilio', '$dormitorios','$mejoras','$cantidadBanios', '$observacion')";

    if($conn->query($sql) === TRUE){
        header("Location: ../Ejercicio 1/index.php");
        exit();
    } else {
        echo "Error al insertar inmueble" . $conn->error;
    }

    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Formulario Inmuebles</h1>
    <form method="post">
        <label>Tipo Inmueble: </label> <input type="text" name="tipoInmueble"> <br>
        <label>Domicilio: </label> <input type="text" name="domicilio"> <br>
        <label>Cantidad Dormitorios: </label> <input type="number" name="cantidadDormitorios">
        <label>Mejoras: </label> <input type="text" name="mejoras"> <br>
        <label>Cantidad Baños: </label> <input type="number" name="cantidadBanios"><br>
        <label>Observación: </label> <input type="text" name="observacion"><br>

        <button type="submit" name="btnEnviar">Enviar</button>
    </form>
</body>
</html>
