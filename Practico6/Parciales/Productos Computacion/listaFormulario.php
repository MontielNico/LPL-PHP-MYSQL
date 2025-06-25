<?php
require_once "Producto.class.php";

if(isset($_GET['codigoProducto'])){
    $producto = new Producto();

    echo json_encode($producto->sucursalesProducto($_GET['codigoProducto']));
}
?>