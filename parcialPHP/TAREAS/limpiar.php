<?php 
session_start();

$_SESSION['tareasPendientes'] = [];
$_SESSION['tareasFinalizadas'] = [];

header("Location: tareas.php");
exit;

?>