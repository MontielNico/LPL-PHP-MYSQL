<?php
session_start();

require_once 'clases/Paciente.class.php';
require_once 'funciones.php';

if(!isset($_SESSION['pacientes'])){
    $_SESSION['pacientes'] = array();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calculadora</title>
</head>
<body>
    <?php
    if(isset($_POST['botonCalcular'])){
        $_SESSION['pacientes'][] = [
            'nombre' => $_POST['nombre_paciente'],
            'peso' => $_POST['peso_paciente'],
            'altura' => $_POST['altura_paciente'],
            'imc' => calcularIMC($_POST['peso_paciente'], $_POST['altura_paciente']),
            'resultado' => generarResultado(calcularIMC($_POST['peso_paciente'],$_POST['altura_paciente']))
        ];

        $paciente = new Paciente($_POST['nombre_paciente'],$_POST['peso_paciente'],$_POST['altura_paciente'],);
        $paciente->setIMC(calcularIMC($_POST['peso_paciente'], $_POST['altura_paciente']));
        $paciente->setResultado(generarResultado($paciente->getIMC()));

        $paciente->imprimirPaciente();

        echo "<br>";

        generarTabla();

        echo '<a href="calculadora.php">Calcular otra vez</a>';


    } else {
    ?>
    <h1>Bienvenido <?php echo $_SESSION['usuario']?></h1>
    <h2>CALCULADORA IMC</h2>
    <form action="calculadora.php" method="POST">
        <label for="name">Nombre: </label> <input type="text" name="nombre_paciente" required> <br>
        <label for="height">Altura(m): </label> <input type="number" name="altura_paciente" step="0.01" min = "0"> <br>
        <label for="weight">Peso(kg): </label> <input type="number" name="peso_paciente" min = 0 required> <br>
        <button type="submit" name="botonCalcular">Calcular</button>
    </form>
    <?php
    } ?>
    <a href="logout.php">Cerrar Sesion</a>
</body>
</html>