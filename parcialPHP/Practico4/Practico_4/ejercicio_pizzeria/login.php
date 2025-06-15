<?php
session_start();

if(isset($_SESSION['usuario'])){
    header("Location: pizzeria.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $usuario = $_POST['usuario'] ?? '';

    if(!empty($usuario)){
        $_SESSION['usuario'] = $usuario;
        header("Location: pizzeria.php");
        exit;
    } else {
        $advertencia = "Ingresar un usuario por favor";
    }
}
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

    <?php if(!empty($advertencia)) echo "<p style='color:red;'>$advertencia</p>"; ?>

    <form method="POST" action="">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        <input type="submit" value="Entrar">
    </form>
    
</body>
</html>