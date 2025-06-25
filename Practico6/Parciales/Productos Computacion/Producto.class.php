<?php
class Producto {
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost","root","","computacion");
    }

    public function datosProducto($codigoProducto){
        $sql = "SELECT producto.nombreProducto, producto.proveedor, SUM(cantidad) AS stockTotal
                FROM producto JOIN stockproducto ON producto.codigo = stockproducto.codigo
                WHERE producto.codigo = $codigoProducto
                GROUP BY producto.nombreProducto, producto.proveedor";

        $resu = $this->conn->query($sql);

        if($resu->num_rows > 0){
            return $resu->fetch_assoc();
        } else {
            return null;
        }
    }

    public function sucursalesProducto($codigoProducto){
        $sql = "SELECT sucursal, cantidad FROM stockproducto WHERE codigo = $codigoProducto";

        $resu = $this->conn->query($sql);

        $sucursales = [];

        if($resu->num_rows > 0){
            while($row = $resu->fetch_assoc()){
                $sucursales[] = $row;
            }
        }
        return $sucursales;
    }


    public function actualizarStock($codigoProducto, $sucursal, $cantidad){

        $sql = "UPDATE stockproducto
                SET cantidad = $cantidad
                WHERE codigo = $codigoProducto AND sucursal = '$sucursal'";

        $this->conn->query($sql);
    }

    public function obtenerStockSucursal($codigo,$sucursal){
        $sql = "SELECT cantidad FROM stockproducto WHERE codigo = $codigo AND sucursal = '$sucursal'";

        $stock = $this->conn->query($sql);

        if($stock->num_rows>0){
            
            $row = $stock->fetch_assoc();
            return $row['cantidad'];
        }else{
            return null;
        }
    }

}
?>