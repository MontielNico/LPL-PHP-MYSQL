<?php

$conn = new mysqli("localhost", "root", "", "franquicia");

if(isset($_POST['idProducto'])){
    $idProducto = $_POST['idProducto'];
    $sql = "SELECT precio, stock FROM producto WHERE nroProducto = $idProducto";

    $resu = $conn->query($sql);

    if($resu->num_rows > 0){
        $objeto = $resu->fetch_assoc();
        echo json_encode($objeto);
    } else {
        echo "error papuu";
    }
}

?>