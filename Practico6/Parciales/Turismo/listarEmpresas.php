<?php
require_once "Empresa.class.php";

if(isset($_GET['origen']) && isset($_GET['destino'])){
    $empresa = new Empresa();
    $origen = $_GET['origen'];
    $destino = $_GET['destino'];

    if($destino !== 0){
        $empresas = $empresa->devolverEmpresas($origen);
        echo json_encode($empresas);
    } else {
        $empresas = $empresa->devolverEmpresasA($origen,$destino);
        echo json_encode($empresas);
    }

    $empresa->cerrarConexion();
}


?>