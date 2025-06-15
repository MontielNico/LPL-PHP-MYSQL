<?php

function calcularIMC($peso,$altura){
    $IMC = 0;

    return $IMC = $peso / ($altura ** 2);
}

function generarResultado($IMC){
    $resultado = '';

    switch ($IMC) {
        case $IMC < 18.5:
            return $resultado = 'Peso bajo';
            break;
        case $IMC < 24.89:
            return $resultado = 'Peso normal';
            break;
        case $IMC < 29.89:
            return $resultado = 'Sobrepeso';
            break;
        case $IMC > 29.90:
            return $resultado = 'Obesidad';
            break;
        default:
            # code...
            break;
    }
}

function generarTabla(){
    if (!isset($_SESSION['pacientes']) || !is_array($_SESSION['pacientes']) || empty($_SESSION['pacientes'])) {
        echo "<p>No hay pacientes registrados.</p>";
        return;
    }

    $arreglo = $_SESSION['pacientes'];

    echo "<table>";
    echo "<tr><th>Paciente</th><th>IMC</th><th>Resultado</th></tr>";
    foreach ($arreglo as $paciente) {
        echo "<tr>";
        echo "<td>" . $paciente['nombre'] . "<td>";
        echo "<td>" . number_format($paciente['imc'],2) . "<td>";
        echo "<td>" . $paciente['resultado'] . "<td>";
        echo "</tr>";
    }
    echo "</table>";
}




?>