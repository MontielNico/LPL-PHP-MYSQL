<?php

class empleado{
    private $nombre;
    private $salario;
    private $antiguedad;
    private $porcentaje;

    public function __construct($nombre,$salario,$antiguedad){
        $this->nombre = $nombre;
        $this->salario = $salario;
        $this->antiguedad = $antiguedad;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getSalario(){
        return $this->salario;
    }

    public function getAntiguedad(){
        return $this->antiguedad;
    }

    public function getPorcentaje(){
        return $this->porcentaje;
    }

    public function setPorcentaje($porcentaje){
        $this->porcentaje = $porcentaje;
    }

}







?>