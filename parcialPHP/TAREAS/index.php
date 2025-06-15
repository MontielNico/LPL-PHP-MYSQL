<?php

session_start();

// if(isset($_SESSION['usuario'])){
//     header("Location: tareas.php");
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="#" method="POST">
        <label for="usuario">Usuario: </label> <input type="text" name="usuarioIngresado">
        <button type="submit" name="botonIngreso">Ingresar</button>
    </form>
</body>
</html>

<?php

if(isset($_POST['botonIngreso'])){
    $usuario = $_POST['usuarioIngresado'];
    if(!isset($_COOKIE[$usuario])){
        $datos = array();
        $datos = [
            'visitas' => 0,
            'tareasPendientes' => [],
            'tareasFinalizadas' => []
        ];
        setcookie($_POST['usuarioIngresado'], json_encode($datos));
        $_SESSION['visitas'] = 0;
        $_SESSION['tareasPendientes'] = [];
        $_SESSION['tareasFinalizadas'] = [];
        $_SESSION['usuarioLogueado'] = $_POST['usuarioIngresado'];
    } else{
        $datos = json_decode($_COOKIE[$usuario], true);
        $_SESSION['visitas'] = $datos['visitas'];
        $_SESSION['tareasPendientes'] = $datos['tareasPendientes'];
        $_SESSION['tareasFinalizadas'] = $datos['tareasFinalizadas'];
        $_SESSION['usuarioLogueado'] = $_POST['usuarioIngresado'];
    }

    $_SESSION['usuarioLogueado'] = $usuario;
    header("Location: tareas.php");
    exit;
}
?>
