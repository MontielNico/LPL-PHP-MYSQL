<?php
Class Juego{
    private $puntaje;
    private $intento;
    private $numerosIntentados;
    private $acierto;
    
    public function __construct(){
        $this->puntaje = 10;
        $this->intento = 1;
        $this->numerosIntentados = [];
        $this->acierto = false;
    }

    public function getPuntaje(){
        return $this->puntaje;
    }

    public function getIntento(){
        return $this->intento;
    }

    public function getNumerosIntentados(){
        return $this->numerosIntentados;
    }

    public function decrementarPuntaje(){
        $this->puntaje --;
    }

    public function finalizado(){
        return $this->acierto || $this->puntaje === 0;
    }


    public function realizarIntento($numero){
        $this->numerosIntentados[] = $numero;

        if($this->esCentroNumerico($numero)){
            $this->acierto = true;
        } else{
            $this->puntaje--;
            $this->intento++;
        }

    }

    private function esCentroNumerico($numero) {
        $sumaIzquierda = 0;
        for ($i = 1; $i < $numero; $i++) {
            $sumaIzquierda += $i;
        }

        $sumaDerecha = 0;
        $j = $numero + 1;
        while ($sumaDerecha < $sumaIzquierda) {
            $sumaDerecha += $j;
            $j++;
        }

        return $sumaIzquierda === $sumaDerecha;
    }

    public function mostrarResultados($numero){
        if($this->esCentroNumerico($numero)){
            return "Felicidades, ". $numero ." es un centro numerico";
        }else{
            return "Intentalo de nuevo... " . $numero . " no es un centro numerico";
        }
    }


}
?>