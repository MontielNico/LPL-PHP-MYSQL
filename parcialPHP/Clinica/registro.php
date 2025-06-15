<?php

include 'cookieManager.php';

session_start();

$cookie = new CookieManager();

if(isset($_SESSION['usuario'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <form action="#" method="post">
        <label for="user">Nombre: </label> <input type="text" name="nombre" id="id_nombre" required> <br>
        <label for="dni">DNI: </label> <input type="number" name="dni" min=0 required> <br>
        <label for="contrasenia">Contraseña: </label> <input type="password" name="password" required> <br>
        <button type="submit" name="botonEnviar" value="enviar">Registrar</button>
    </form>
    <a href="index.php">Ya tengo una cuenta</a>
</body>
</html>

<?php
if(isset($_POST['botonEnviar'])){
    $datos = array();
    $datos = ["nombre" => $_POST['nombre'], "pswd" => $_POST['password']];
    $cookie->set($_POST['dni'],json_encode($datos));
    $_SESSION['usuario'] = $_POST['nombre'];
    header("Location: calculadora.php");
    exit;
} 
