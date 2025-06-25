<?php
$conn = new mysqli("localhost","root","","paises");

if(isset($_GET['pais'])){
    $pais = $_GET['pais'];
    $sql = "SELECT nombre FROM ciudad WHERE idPais = $pais";
    $resu = $conn->query($sql);

    $ciudades = [];

    if($resu->num_rows > 0){
        while($row = $resu->fetch_assoc()){
            $ciudades[] = $row['nombre'];
        }
    }

    echo json_encode($ciudades);
}

?>