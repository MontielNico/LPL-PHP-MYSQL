<?php
class Producto {
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost", "root", "", "comparador");
    }

    public function cerrarConexion(){
        return $this->conn->close();
    }

    public function listarProductos($producto){
        $producto = $this->conn->real_escape_string($producto);
        $sql = "SELECT p.nombre, pr.precio, s.nombre AS nombreS, s.ubicacion 
        FROM producto AS p JOIN precios AS pr ON p.id_producto = pr.id_producto
        JOIN supermercado AS s ON s.id_supermercado = pr.id_supermercado
        WHERE p.nombre LIKE '%$producto%'";

        $resu = $this->conn->query($sql);

        $productos = [];

        if($resu->num_rows > 0){
            while($row = $resu->fetch_object()){
                $obj = new stdClass();
                $obj->nombreP = $row->nombre;
                $obj->precio = $row->precio;
                $obj->nombreS = $row->nombreS;
                $obj->ubicacion = $row->ubicacion;

                $productos[] = $obj;
            }
            return $productos;
        }
    }

    public function listarUbicacion($ubicacion){
        $ubicacion = $this->conn->real_escape_string($ubicacion);

        $sql = "SELECT p.nombre, pr.precio, s.nombre AS nombreS, s.ubicacion 
        FROM producto AS p JOIN precios AS pr ON p.id_producto = pr.id_producto
        JOIN supermercado AS s ON s.id_supermercado = pr.id_supermercado
        WHERE s.ubicacion = '$ubicacion'";

        $resu = $this->conn->query($sql);

        if($resu->num_rows > 0){
            while($row = $resu->fetch_object()){
                $obj = new stdClass();
                $obj->nombreP = $row->nombre;
                $obj->precio = $row->precio;
                $obj->nombreS = $row->nombreS;
                $obj->ubicacion = $row->ubicacion;

                $productos[] = $obj;
            }
            return $productos;
        }
    }

    public function listarAmbos($producto,$ubicacion){
        $ubicacion = $this->conn->real_escape_string($ubicacion);
        $producto = $this->conn->real_escape_string($producto);

        $sql = "SELECT p.nombre, pr.precio, s.nombre AS nombreS, s.ubicacion 
        FROM producto AS p JOIN precios AS pr ON p.id_producto = pr.id_producto
        JOIN supermercado AS s ON s.id_supermercado = pr.id_supermercado
        WHERE s.ubicacion = '$ubicacion' AND p.nombre LIKE '%$producto%'";

        $resu = $this->conn->query($sql);

        if($resu->num_rows > 0){
            while($row = $resu->fetch_object()){
                $obj = new stdClass();
                $obj->nombreP = $row->nombre;
                $obj->precio = $row->precio;
                $obj->nombreS = $row->nombreS;
                $obj->ubicacion = $row->ubicacion;

                $productos[] = $obj;
            }
            return $productos;
        }
    }

    public function listarDetalle($producto){
        $producto = $this->conn->real_escape_string($producto);

        $sql = "SELECT s.nombre AS nombreS, pr.precio, s.ubicacion
        FROM producto AS p JOIN precios AS pr ON p.id_producto = pr.id_producto
        JOIN supermercado AS s ON s.id_supermercado = pr.id_supermercado
        WHERE p.nombre = '$producto'";

        $sql2 = "SELECT MAX(pr.precio) AS maximo, MIN(pr.precio) AS minimo
        FROM producto AS p JOIN precios AS pr ON p.id_producto = pr.id_producto
        JOIN supermercado AS s ON s.id_supermercado = pr.id_supermercado
        WHERE p.nombre = '$producto'";


        $resu = $this->conn->query($sql);

        $productos = [];

        if($resu->num_rows > 0){
            while($row = $resu->fetch_object()){
                $obj = new stdClass();
                $obj->precio = $row->precio;
                $obj->nombreS = $row->nombreS;
                $obj->ubicacion = $row->ubicacion;

                $productos[] = $obj;
            }
            return $productos;
        }
    }
}
?>