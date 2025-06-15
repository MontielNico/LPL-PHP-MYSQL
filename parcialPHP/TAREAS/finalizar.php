<?php
session_start();

if(isset($_POST['tareasFinalizadas'])){
    foreach ($_POST['tareasFinalizadas'] as $tareaFinalizada) {
        $index = array_search($tareaFinalizada, $_SESSION['tareasPendientes']);
        if($index !== false){
            unset($_SESSION['tareasPendientes'][$index]);
            $_SESSION['tareasPendintes'] = array_values($_SESSION['tareasPendientes']);

            $_SESSION['tareasFinalizadas'][] = $tareaFinalizada;
        }
    }
}

header("location: tareas.php");
exit;

?>