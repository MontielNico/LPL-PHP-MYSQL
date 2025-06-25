<?php
class Empresa{
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "raileurope");
    }

    public function cerrarConexion(){
        return $this->conn->close();
    }

    public function devolverDestinos($origen){
        $origen = $this->conn->real_escape_string($origen);

        $sql = "SELECT ciudadDestinoServicio FROM servicios WHERE ciudadOrigenServicio = '$origen' GROUP BY ciudadDestinoServicio";

        $resu = $this->conn->query($sql);
        $destinos = [];

        if($resu->num_rows > 0){
            while($row = $resu->fetch_object()){
                $destinos[] = $row;
            }
            return $destinos;
        } else{
            return "No hay datos";
        }
    }

    public function devolverEmpresas($origen){
        $origen = $this->conn->real_escape_string($origen);

        $sql = "SELECT e.idEmpresa, e.nombreEmpresa, e.paisEmpresa, e.webEmpresa, e.logoEmpresa FROM empresas AS e JOIN servicios AS s ON e.idEmpresa = s.idEmpresa WHERE s.ciudadOrigenServicio = '$origen' GROUP BY e.nombreEmpresa, e.paisEmpresa, e.webEmpresa, e.logoEmpresa";

        $resu = $this->conn->query($sql);
        $empresas = [];

        if($resu->num_rows > 0){
            while($row = $resu->fetch_object()){
                $empresas[] = $row;
            }
            return $empresas;
        } else {
            $obj = new stdClass();
            $obj->nombreEmpresa = "-----";
            $obj->paisEmrpesa = "-----";
            $obj->webEmpresa = "-----";
            $obj->logoEmpresa = "-----";
            return $obj;
        }
    }

    public function devolverEmpresasA($origen,$destino){
        $origen = $this->conn->real_escape_string($origen);
        $destino = $this->conn->real_escape_string($destino);

        $sql = "SELECT e.idEmpresa, e.nombreEmpresa, e.paisEmpresa, e.webEmpresa, e.logoEmpresa FROM empresas AS e JOIN servicios AS s ON e.idEmpresa = s.idEmpresa WHERE s.ciudadOrigenServicio = '$origen' AND s.ciudadDestinoServicio = '$destino' GROUP BY e.nombreEmpresa, e.paisEmpresa, e.webEmpresa, e.logoEmpresa";

        $resu = $this->conn->query($sql);
        $empresas = [];

        if($resu->num_rows > 0){
            while($row = $resu->fetch_object()){
                $empresas[] = $row;
            }
            return $empresas;
        } else {
            $obj = new stdClass();
            $obj->nombreEmpresa = "-----";
            $obj->paisEmrpesa = "-----";
            $obj->webEmpresa = "-----";
            $obj->logoEmpresa = "-----";
            return $obj;
        }
    }

    public function listarServicios($idEmpresa, $origen){
        $origen = $this->conn->real_escape_string($origen);
        $idEmpresa = $this->conn->real_escape_string($idEmpresa);

        $sql = "SELECT * FROM servicios WHERE ciudadOrigenServicio = '$origen' AND idEmpresa = '$idEmpresa'";

        $resu = $this->conn->query($sql);
        $servicios = [];

        if($resu->num_rows > 0){
            while($row = $resu->fetch_object()){
                $servicios[] = $row;
            }
            return $servicios;
        } else{
            $obj = new stdClass();
            return $obj;
        }
    }
}
?>