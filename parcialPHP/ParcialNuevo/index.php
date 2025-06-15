<?php
require_once "juego.class.php";

session_start();


//setear cookie
if (!isset($_COOKIE['numeroJuego'])) {
    setcookie('numeroJuego', 1);
    $numero_juego = 1;
} else {
    $numero_juego = $_COOKIE['numeroJuego'];
}

//rendirse
if (isset($_POST['btnRendirse'])) {
    session_destroy();
    $numero_juego++;
    setcookie('numeroJuego', $numero_juego);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

//obtener juego de sesión
if (!isset($_SESSION['juego'])) {
    $_SESSION['juego'] = new Juego();
}

$juego = $_SESSION['juego'];

//evaluar intento
if (isset($_POST['numeroIngresado']) && !isset($_POST['btnRendirse']) && $_POST['numeroIngresado'] != '') {
    $numero = intval($_POST['numeroIngresado']);
    $juego->realizarIntento($numero);
    $mensaje = $juego->mostrarResultados($numero);
    $_SESSION['juego'] = $juego;
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro Numerico</title>
    <link rel="stylesheet" href="estilos.css">

</head>

<body>
    <header>
        <h1>Adivina el Centro Numerico</h1>
        <p>Numero Juego: <strong><?php echo $numero_juego ?></strong> </p>
        <p>Puntaje: <strong><?php echo $juego->getPuntaje() ?></strong></p>
        <p>Numeros Arriesgados: <strong><?php echo implode(", ", $juego->getNumerosIntentados()); ?></strong></p>
    </header>
    <?php
    if ($juego->finalizado()) {
    ?>
        <div>
            <form method="POST">
                <label>Juego Terminado</label> <br>
                <button type="submit" name="btnRendirse">Volver a Jugar</button>
            </form> <br>
        </div>
    <?php } else { ?>
        <form method="POST">
            <div class="form-intento">
                <label for="numeroIngresado">Ingresar Número</label> 
                <input type="number" name="numeroIngresado" id="numeroIngresado" min="0" /> <br>
                <button type="submit" name="btnIntentar">Intentar</button>
                <button type="submit" name="btnRendirse">Rendirse</button>
            </div>
        </form> <br>
    <?php } ?>

    <?php echo $mensaje ?? " "; ?>
</body>
</html>