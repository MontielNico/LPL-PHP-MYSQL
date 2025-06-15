<?php

require_once "Juego.class.php";

session_start();

//setearCookies

if(!isset($_COOKIE['ultimoAcceso']) || !isset($_COOKIE['partidasGanadas'])){ // la primera vez saltan los errores hasta que se crea la cookie, por favor refrescar hasta que aparezca la pagina.
    setcookie('ultimoAcceso', date('d/m/y'), time() + 7 * 24 * 60 * 60);
    setcookie('partidasGanadas', 0, time() + 7 * 24 * 60 * 60);
    $ultAcceso = $_COOKIE['ultimoAcceso'];
    $partidasGanadas = $_COOKIE['partidasGanadas'];
} else {
    $ultAcceso = $_COOKIE['ultimoAcceso'];
    $partidasGanadas = $_COOKIE['partidasGanadas'];
}

//juegoNuevo
if(isset($_POST['btnJuegoNuevo']) && !isset($_POST['btnAbandonar'])){
    $_SESSION['numeroJuego'] ++;
    $_SESSION['juego'] = new Juego();
}

if(isset($_POST['btnAbandonar'])){
    $_SESSION['juego'] = new Juego();
}

//recuperar Juego
if(!isset($_SESSION['juego'])){
    $_SESSION['juego'] = new Juego();
    $_SESSION['numeroJuego'] = 1;
}

$juego = $_SESSION['juego'];


//tirar
if(isset($_POST['btnTirar'])){
    $juego->realizarTirada();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Dados</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<header>
    <h1>Juego de Dados  </h1>
    <p>Fecha Ultimo Accesso: <strong><?php echo $ultAcceso?></strong></p>
    <p>Partidas ganadas: <strong><?php echo $partidasGanadas?></strong></p>
</header>

<div>
    <p>Numero de Juego: <strong><?php echo $_SESSION['numeroJuego']?></strong></p>
    <p>Numero de Tirada: <strong><?php echo $juego->getNroTirada();?></strong></p>
    <p>Dado Jugador: <strong><?php echo $juego->getDadoJugador();?></strong></p>
    <p>Dado Compu: <strong><?php echo $juego->getDadoCompu();?></strong></p>
    <p>Jugador: <strong><?php echo $juego->getVidasJugador();?></strong></p>
    <p>Compu: <strong> <?php echo $juego->getVidasCompu();?></strong></p>
</div>

<?php
if($juego->juegoFinalizado()){

    if($juego->getGanador() === "Jugador"){
        $partidasGanadas = $_COOKIE['partidasGanadas'];
        $partidasGanadas++;
        setcookie("partidasGanadas", $partidasGanadas, time() + 7 * 24 * 60 * 60);
    }

    $juego->mostrarResultado();
    ?>
    <form method="POST">
        <button type="submit" name="btnJuegoNuevo">Nuevo Juego</button>
    </form>
<?php } else {?>

<form method="post">
    <button type="submit" name="btnTirar">Tirar</button>
    <button type="submit" name="btnAbandonar">Abandonar</button>
    <button type="submit" name="btnJuegoNuevo">Nuevo Juego</button>
</form>
<?php
}
?>    
</body>
</html>
