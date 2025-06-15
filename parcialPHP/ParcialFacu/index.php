<?php
require_once('Usuario.class.php');
require_once('Calculadora.class.php');
$juegoIniciado = false;
$mensaje = '';
$terminado = false;
if (isset($_GET['terminar'])) {
    $usuario = $_SESSION['usuario'];
    $usuario->cerrarSesion();
    header('Location: index.php');
    exit;
}
if (isset($_GET['jugar']) || isset($_GET['intento']) || isset($_GET['reiniciar'])) {
    $juegoIniciado = true;
    $usuario = new Usuario();
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    } else {
        $usuario->actualizarSesion();
        $usuario->resetNumeros();
    }
}
if (isset($_GET['rendirse'])) {
    $juegoIniciado = true;
    $terminado = true;
    $mensaje = 'Que pena, te rendiste.';
    $usuario = $_SESSION['usuario'];
    $usuario->incrementaIntento();
    $usuario->resetPuntaje();

    $usuario->resetNumeros();
}

if (isset($_GET['numero'])) {
    if ($_GET['numero'] != "") {
        $usuario = $_SESSION['usuario'];
        $juegoIniciado = true;
        $numero = (int)$_GET['numero'];
        $flag = Calculadora::verficarCentroNumerico($numero);
        $usuario->guardarNumero($numero);
        if ($flag) {
            $juegoTerminado = true;
            $mensaje = 'Felicitaciones, ganaste!';

            $terminado = true;
        } else {
            if ($usuario->getPuntaje() == 0) {
                $mensaje = 'Se te acabaron los intentos, perdiste.';
                $usuario->incrementaIntento();
                $usuario->resetPuntaje();
                $usuario->resetNumeros();

                $terminado = true;
            } else {
                $usuario->decrementaPuntaje();
                $usuario->actualizarSesion();
                if (Calculadora::verificarCercania($numero)) {
                    $mensaje = 'No acertaste. Estas muy cerca!, segui intentando!.';
                } else {
                    $mensaje = 'No acertaste. Estas lejos, pero segui intentando!.';
                }
            }
        }
    } else {
        $usuario = $_SESSION['usuario'];
        $juegoIniciado = true;
    }
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h2>Encuentra un centro numerico</h2>
    </header>

    <?php
    if ($juegoIniciado &&  !$terminado) {
    ?>
        <div class="divInit">
            <h1>adivine el centro numerico</h1>
            <form action="index.php" method='get' class="formu">
                <div>
                    <input type="number" name="numero" class="inp" placeholder="Ingresa un numero">
                </div>
                <button type="submit" name="intento" class="btn btn-verde">Intento</button>
                <button type="submit" name="rendirse" class="btn btn-naranja">Rendirse</button>
                <button type="submit" name="terminar" class="btn btn-rojo">Terminar</button>
            </form>
            <?php
            echo '<div>
            <div>Puntaje:' . $usuario->getPuntaje() . '</div>
            <div>Nro juego:' . $usuario->getIntento() . '</div>
            <div>' . $usuario->mostrarNumeros() . '</div>
            <div></div>
            </div>';
            echo '<div>' . $mensaje . '</div>';
            ?>
        </div>
    <?php
    }
    if ($terminado) {

    ?>
        <div class="divInit">

            <?php
            echo '<h2>' . $mensaje . '</h2>';
            ?>
            <div>
                <form action="index.php" method="get">
                    <button type="submit" name="reiniciar" class="btn btn-celeste">Reiniciar</button>
                </form>
            </div>
        </div>

    <?php

    }
    if (!$juegoIniciado) {


    ?>

        <div class="divInit">
            <h1>Bienvenido</h1>
            <p>Haga click para jugar</p>
            <form action="index.php" method="get">
                <button type="submit" name="jugar" class="btn btn-celeste">JUGAR</button>
            </form>
        </div>

    <?php
    }
    ?>

    <footer>
        <p>Pagina creada por: Facundo Vidal.</p>
    </footer>
</body>

</html>