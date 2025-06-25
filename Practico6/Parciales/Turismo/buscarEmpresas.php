<?php
require_once "Empresa.class.php";

if(isset($_GET['origen'])){
    $empresa = new Empresa();
    $origen = $_GET['origen'];
    $destinos = $empresa->devolverDestinos($origen);

    echo json_encode($destinos);
    $empresa->cerrarConexion();
}
?>