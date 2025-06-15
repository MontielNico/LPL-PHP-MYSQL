<?php
include 'cookieManager.php';

$cm = new CookieManager();
session_start();

if(isset($_SESSION['usuario'])){
    header("Location: calculadora.php");
}
?>

<form action="#" method="post">
    <label for="numdni">DNI: </label><input type="number" name="dni"> <br>
    <label for="contra">Contraseña: </label><input type="password" name="pswd"> <br>
    <button type="submit" name="btnIngreso">Ingresar</button> <br>
</form>

<a href="registro.php">No tengo una cuenta</a>

<?php

if(isset($_POST['btnIngreso'])){

    $password = $_POST['pswd'];

    if(isset($_COOKIE[$_POST['dni']])){
        $datos = json_decode($_COOKIE[$_POST['dni']],true);

        if($datos['pswd'] === $password){
            $_SESSION['usuario'] = $datos['nombre'];
            header("Location: calculadora.php");
            exit;
        } else {
            echo "contraseña incorrecta";
        }
    } else{
        echo "no se encontro al usuario";
    }
}

?>