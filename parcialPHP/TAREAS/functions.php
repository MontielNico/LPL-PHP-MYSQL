<?php 
function anadirTarea(){
    $tareas = $_SESSION['tareasPendientes'];

    if(empty($tareas)){
        return;
    }

    foreach ($tareas as $tarea) {
        echo "<input type='checkbox' name='tareasFinalizadas[]' value='" . htmlspecialchars($tarea) . "'>";
        echo "<label>".htmlspecialchars($tarea)."</label><br>";
    }

    echo "<button type='submit'>Finalizar Tareas</button>";
}

function cargarFinalizadas(){
    foreach($_SESSION['tareasFinalizadas'] as $tarea){
        echo "<li>" . $tarea . "</li>";
    }
}


?>