<?php

session_start();

$datos = array();

$datos = [
    'visitas' => $_SESSION['visitas'] ?? 0,
    'tareasPendientes' => $_SESSION['tareasPendientes'] ?? [],
    'tareasFinalizadas' => $_SESSION['tareasFinalizadas'] ?? []
];

setcookie($_SESSION['usuarioLogueado'], json_encode($datos), time() + 7 * 24 * 60 * 60, "/"); //guardar cookie una semana

// $_SESSION = []; //limpiar sesion

session_destroy();

header("Location: index.php");
exit;


?>