<?php

//conexión
$connection = new mysqli("localhost", "root", "", "inmobiliaria");

if ($connection->connect_error) {
    die("Error al conectar: " . $connection->connect_error);
}

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "SELECT * FROM inmueble WHERE idInmueble = $id";
    $resultado = $connection->query($sql);

    if ($resultado->num_rows > 0 && $resultado) {
        $fila = $resultado->fetch_array();
    } else {
        die("no se encontro inmueble con ese id");
    }

} else {
    die("ID no especificado");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de modificación</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <h1>Formulario de Molificación</h1>
    </header>
    <form method="POST">
        <label>ID: <?php echo $fila['idInmueble']; ?></label> <br>

        Tipo: <input type="text" name="tipoInmueble" value="<?php echo $fila['tipoInmueble'] ?>"> <br>

        Domicilio: <input type="text" name="domicilio" value="<?php echo $fila['domicilio'] ?>"> <br>

        Cantidad Dormitorios: <input type="number" name="cantidadDormitorios" value="<?php echo $fila['cantidadDormitorios'] ?>"> <br>

        Mejoras: <input type="text" name="mejoras" value="<?php echo $fila['mejoras'] ?>"> <br>

        Cantidad Baños: <input type="number" name="cantidadBanios" value="<?php echo $fila['cantidadBanios'] ?>"> <br>

        <button type="submit" name="btnModificar">Enviar</button>

    </form>
</body>

</html>

<?php
if (isset($_POST['btnModificar'])) {
    $tipo = $_POST['tipoInmueble'];
    $domicilio = $_POST['domicilio'];
    $dormitorios = $_POST['cantidadDormitorios'];
    $mejoras = $_POST['mejoras'];
    $cantidadBanios = $_POST['cantidadBanios'];

    $sql = "UPDATE inmueble SET tipoInmueble = '$tipo', domicilio = '$domicilio', cantidadDormitorios = $dormitorios, mejoras = '$mejoras', cantidadBanios = $cantidadBanios WHERE idInmueble = $id";

    $exito = $connection->query($sql);

    if ($exito) {
        echo "Modificación realizada con éxito <br>";
        echo "<a href='index.php'>Volver Al Listado</a>";
    } else {
        echo "Se produjo un error";
        header("Location: modificar.php");
    }
}

$connection->close();
?>