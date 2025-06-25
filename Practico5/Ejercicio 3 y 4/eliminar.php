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
    <title>Confirmacion</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>Confirmacion</h1>
    <form method="post">

        <label>ID: <?php echo $fila['idInmueble']?></label> <br>
        <label>Tipo: <?php echo $fila['tipoInmueble']?></label> <br>
        <label>Domicilio: <?php echo $fila['domicilio']?></label><br>
        <label>Cantidad Dormitorios: <?php echo $fila['cantidadDormitorios']?></label><br>
        <label>Cantidad Baños: <?php echo $fila['cantidadBanios']?></label><br>
        <label>Mejoras: <?php echo $fila['mejoras']?></label><br>

        <p>Confirmar eliminación?</p> <br>

        <button type="submit" name="btnConfirmar">Confirmar</button>
        <button type="submit" name="btnCancelar">Cancelar</button>
    </form>
</body>
</html>

<?php

if(isset($_POST['btnConfirmar'])){

    $sql = "DELETE FROM inmueble WHERE idInmueble = $id";

    $exito = $connection->query($sql);

    if($exito){
        echo "Eliminación completada con éxito <br>";
        echo "<a href='index.php'>Volver al Listado</a>";
    } else {
        echo "se produjo un error";
        header("Location: eliminar.php");
    }
}

if(isset($_POST['btnCancelar'])){
    header("Location: index.php");
}

$connection->close();

?>