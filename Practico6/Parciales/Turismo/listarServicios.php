<?php
require_once "Empresa.class.php";

if(isset($_POST['idEmpresa']) && isset($_POST['origen'])){
    $empresa = new Empresa();
    $idEmpresa = $_POST['idEmpresa'];
    $origen = $_POST['origen'];

    $servicios = $empresa->listarServicios($idEmpresa,$origen);

    echo json_encode($servicios);
    $empresa->cerrarConexion();
}
?>