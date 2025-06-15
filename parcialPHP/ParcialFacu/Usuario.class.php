<?php
session_start();
class Usuario{
    private $puntaje;
    private $intento;

    private $numeros = [];
    public function __construct() {
        $this->puntaje = 10;
        $this->intento = 1;
        $this->numeros=[];
    }

    public function getPuntaje(){
        return $this->puntaje;
    }
    public function getIntento(){
        return $this->intento;
    }

    public function incrementaIntento(){
        $this->intento = $this->intento +1;
    }
    public function decrementaPuntaje(){
        $this->puntaje = $this->puntaje -1;
    }
    public function resetPuntaje(){
        $this->puntaje = 10;
    }
    public function actualizarSesion(){
        $_SESSION['usuario'] = $this;
    }
    public function cerrarSesion()  {
        session_destroy();
    }
    public function getNumeros(){
        return $this->$numeros;
    }
    public function guardarNumero($numero){
        $arreglo =$this->numeros;
        array_push($arreglo,$numero);
        $this->numeros = $arreglo;

    }
    public function resetNumeros(){
        $this->numeros = [];
    }
    public function mostrarNumeros()  {
        $arreglo=$this->numeros;
        $len=count($arreglo);
    if($len>0){
        for ($i=0;$i<$len;$i++){
            echo $arreglo[$i].'-';
        }
    }
 
    }
}
?>