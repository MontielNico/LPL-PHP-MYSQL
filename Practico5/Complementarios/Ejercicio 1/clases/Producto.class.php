<?php

class Producto{
    private $nroProducto;
    private $descripcion;
    private $stock;
    private $precio;
    private $descuento;
    private $impuesto;

    public function __construct($nroProducto, $descripcion, $stock, $precio, $descuento, $impuesto)
    {
        $this->nroProducto = $nroProducto;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->precio = $precio;
        $this->descuento = $descuento;
        $this->impuesto = $impuesto;
    }

    public function precioTotal(){
        $total = $this->precio;
        $descuento  = ($this->precio / 100) * $this->descuento;
        $impuesto = ($this->precio/ 100) * $this->impuesto;

        return $total += $impuesto - $descuento;
    }

    public function hayStock($cantidad){
        return $this->stock >= $cantidad;
    }



}
?>