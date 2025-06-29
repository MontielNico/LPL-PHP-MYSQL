<?php
require_once "Producto.class.php";

if(isset($_GET['producto']) && isset($_GET['ubicacion'])){
    $producto = new Producto();
    $productoBuscar = $_GET['producto'];
    $ubicacionBuscar = $_GET['ubicacion'];

    if($productoBuscar !== "" && $ubicacionBuscar == 0){
        $datos = $producto->listarProductos($productoBuscar);
        echo json_encode($datos);
    }elseif($productoBuscar == "" && $ubicacionBuscar !== 0){
        $datos = $producto->listarUbicacion($ubicacionBuscar);
        echo json_encode($datos);
    }else{
        $datos = $producto->listarAmbos($productoBuscar,$ubicacionBuscar);
        echo json_encode($datos);
    }

    $producto->cerrarConexion();
}
?>