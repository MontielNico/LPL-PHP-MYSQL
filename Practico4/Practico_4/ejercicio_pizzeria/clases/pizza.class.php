<?php
class pizza{
    private $nombrePizza;
    private $descripcion;
    private $precio;
    private $imagen;

    public function __construct($nombre,$descripcion,$precio,$imagen){
        $this->nombrePizza = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->imagen = $imagen;
    }

    public function getNombre(){
        return $this->nombrePizza;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function imprimirPizza(){
        echo "<div style='border: 1px solid;'><p>". $this->nombrePizza . "  $" . $this->precio . " " . $this->imagen . " " . $this->descripcion . "</p></div><br>";
    }
}




?>