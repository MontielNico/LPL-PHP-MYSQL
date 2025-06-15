<?php
class Paciente{
    private string $nombre;
    private float $peso;
    private float $altura;
    private float $IMC; 
    private string $resultado;

    public function __construct($nombre,$peso,$altura){
        $this->nombre = $nombre;
        $this->peso = $peso;
        $this->altura = $altura;
    }
     
    public function getNombre(){
        return $this->nombre;
    }

    public function getPeso(){
        return $this->peso;
    }

    public function getAltura(){
        return $this->altura;
    }

    public function getIMC(){
        return $this->IMC;
    }

    public function getResultado(){
        return $this->resultado;
    }

    public function setIMC($imc){
        $this->IMC = $imc;
    }

    public function setResultado($resultado){
        $this->resultado = $resultado;
    }

    public function imprimirPaciente(){
        echo "Paciente: " . $this->nombre ."<br>";
        echo "Peso: " . $this->peso . "Kg"."<br>";
        echo "Altura: " . $this->altura . "mts"."<br>";
        echo "IMC: " . $this->IMC."<br>";
        echo "Resultado: " . $this->resultado."<br>";
    }


}

?>