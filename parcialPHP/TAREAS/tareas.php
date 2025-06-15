<?php
session_start();
$_SESSION['visitas']++;

include "functions.php";

if (isset($_POST['tareaIngresada']) && $_POST['tareaIngresada'] !== '') {
    if (!isset($_SESSION['tareasPendientes'])) {
        $_SESSION['tareasPendientes'] = [];
    }
    $_SESSION['tareasPendientes'][] = $_POST['tareaIngresada'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tareas</title>
</head>
<body>
    <h1>Bienvenido: <?php echo $_SESSION['usuarioLogueado']?></h1>
    <h2>Visitas: <?php echo $_SESSION['visitas'] ?></h2>
    <a href="logout.php">Cerrar Sesion</a> 
    <a href="limpiar.php">Limpiar Tareas</a> <br>
    <form action="#" method="POST">
        <label for="tareita">Ingresar Tarea: </label> <input type="text" name="tareaIngresada">
        <button type="submit" name="botonTarea">Ingresar</button>
    </form>
    <div>
        <h2>Tareas Pendientes</h2>
        <form action="finalizar.php" method="POST">
            <?php
            anadirTarea();
            ?>
        </form>
    </div>
    <div>
        <h2>Tareas Finalizadas</h2>
        <ul>
        <?php
        cargarFinalizadas();
        ?>
        </ul>
    </div>
</body>
</html>
