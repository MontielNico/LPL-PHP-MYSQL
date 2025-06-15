<?php
session_start();
include_once 'clases/pizza.class.php';
require_once 'clases/pedido.class.php';
require_once 'clases/entregaDomicilio.php';
require_once 'clases/entregaLocal.php';

$pizzas = [
    "muzzarella" => new pizza("Muzzarella","pizza de queso muzzarella muy rica",150,"IMAGENPIZZA"),
    "cuatro_quesos" => new pizza("Cuatro Quesos","pizza de cuatro quesos muy rica",250,"IMAGENPIZZA"),
    "napolitana" => new pizza("Napolitana","pizza de queso muzzarella con jamon y tomate",300,"IMAGENPIZZA"),
];


$entrega;

$tipo_entrega = $_POST['entrega'];

if($tipo_entrega === "domicilio"){
    $entrega = new entregaDomicilio();
} else {
    $entrega = new entregaLocal();
}

if(isset($_POST['cantidades'])){
    $cantidades = $_POST['cantidades'];
    $pedido = new pedido($cantidades,$pizzas,$entrega);
    $pedido-> mostrarResumen();
}


?>