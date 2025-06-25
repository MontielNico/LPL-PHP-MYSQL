<?php
require "Producto.class.php";

if(isset($_POST['codigoProducto'])&& isset($_POST['sucursal'])&& isset($_POST['cantidad'])){
    $producto = new Producto();
    $codigo = $_POST['codigoProducto'];
    $sucursal = $_POST['sucursal'];
    $cantidad = $_POST['cantidad'];

    $producto->actualizarStock($codigo,$sucursal,$cantidad);

    $stockSucursal = $producto->obtenerStockSucursal($codigo,$sucursal);
    $stockTotal = $producto->datosProducto($codigo);

    $datos=[];

    $datos[] = $stockSucursal;
    $datos[] = $stockTotal;

    echo json_encode($datos);

}
?>