<?php
class Compra{
    private $nroCompra;
    private $producto;
    private $cantidad;

    public function __construct($nroCompra, $producto, $cantidad)
    {
        $this->$nroCompra = $nroCompra;
        $this->$producto = $producto;
        $this->$cantidad = $cantidad;
    }

    
}
?>