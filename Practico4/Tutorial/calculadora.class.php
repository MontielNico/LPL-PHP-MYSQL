<?php
class calculadora{
    private $a;
    private $b;

    public function __construct(){
        $this->a = rand(1,5);
        $this->b = rand(1,5);
    }

    public function getA(){
        return $this->a;
    }

    public function getB(){
        return $this->b;
    }

    public function getNumeroComplejo(){
        return "z = (".$this->a.","." ".$this->b.")";
    }

    public function getFormaBinomica(){
        return "z = ".$this->a." + ".$this->b."i";
    }

    public function getModulo(){
        $modulo = sqrt(($this->a**2) + ($this->b**2));
        return "|z| = ". $modulo;
    }


}
?>