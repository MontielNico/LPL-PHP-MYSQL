<?php

$conn = new mysqli("localhost", "root", "", "inmobiliaria");

if($conn->connect_error){
    die("Error al conectar" . $conn->connect_error);
}

if(isset($_GET['dni'])){
    $dni = $_GET['dni'];
    $sql = "SELECT c.ApellidoNombre, c.domicilio, c.nroDocumento, i.tipoInmueble FROM cliente c INNER JOIN inmueble i ON c.domicilio = i.domicilio WHERE c.nroDocumento = $dni";
    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){
        $cliente = $resultado->fetch_assoc();
        echo "<ul>";
        echo "<li>Nombre y Apellido: " . $cliente['ApellidoNombre'] . "</li>";
        echo "<li>DNI: " . $cliente['nroDocumento'] . "</li>";
        echo "<li>Domicilio: " . $cliente['domicilio'] . "</li>";
        echo "<li>Inmueble Alquilado: " . $cliente['tipoInmueble'] . "</li>";
        echo "</ul>";
    } else {
        echo "no hay resultados";
    }
} else {
    echo "No hay DNI seteado";
}

$conn->close();


?>