<?php
require_once "Producto.class.php";

if(isset($_GET['producto'])){
    $producto = new Producto();

    $productoBuscar = $_GET['producto'];

    $detalle = $producto->listarDetalle($productoBuscar);

    echo json_encode($detalle);

}
?>