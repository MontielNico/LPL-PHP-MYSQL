<?php
class Pedido{
    private $producto;
    private $cantidad;
    private $pais;
    private $precioTotal;
    private $envio;

    public function __construct($producto,$cantidad,$pais)
    {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->pais = $pais;
        $this->envio = 0;
        $this->precioTotal = 0;
    }

    public function getPais(){
        return $this->pais;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function getProducto(){
        return $this->producto;
    }

    public function getPrecioTotal(){
        return $this->precioTotal;
    }

    public function getEnvio(){
        return $this->envio;
    }

    public function calcularEnvio(){
        switch ($this->pais) {
            case 'Argentina':
                $this->envio = 0;
                break;
            case 'Brasil':
                $this->envio = 150;
                break;
            case 'México':
                $this->envio = 300;
                break;
            default:
                # code...
                break;
        }
    }

    public function calcularTotal(){
        $conn = new mysqli("localhost","root","","franquicia");
        $sql = "SELECT precio FROM producto WHERE descripcion = $this->producto";
        $precio = $conn->query($sql);

        $this->precioTotal = $precio * $this->getCantidad();
    }

    public function mostrarResultados(){
        $this->calcularEnvio();
        $this->calcularTotal();
        echo "Producto: " . $this->getProducto();
        echo "Cantidad: " . $this->getCantidad();
        echo "Total Envio: " . $this->getEnvio();
        echo "Precio Total: " . $this->getPrecioTotal() + $this->getEnvio();
    }


}
?>