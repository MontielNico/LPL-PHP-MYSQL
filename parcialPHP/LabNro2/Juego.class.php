<?php
Class Juego{
    private $nroTirada;
    private $vidasJugador;
    private $vidasCompu;
    private $dadoJugador;
    private $dadoCompu;
    private $ganador;

    public function __construct()
    {
        $this->nroTirada = 1;
        $this->vidasJugador = 20;
        $this->vidasCompu = 20;
        $this->dadoJugador = "-";
        $this->dadoCompu = "-";
        $this->ganador = "";
    }


    //getters
    public function getNroTirada(){
        return $this-> nroTirada;
    }

    public function getVidasJugador(){
        return $this-> vidasJugador;
    }

    public function getVidasCompu(){
        return $this-> vidasCompu;
    }

    public function getGanador(){
        return $this-> ganador;
    }

    public function getDadoJugador(){
        return $this->dadoJugador;
    }

    public function getDadoCompu(){
        return $this->dadoCompu;
    }

    public function juegoFinalizado(){
        if($this->vidasJugador <= 0 || $this->vidasCompu <= 0){
            $this->elegirGanador();
            return true;
        }
    }

    public function elegirGanador(){
        if($this->vidasCompu <= 0){
            $this->ganador = "Jugador";
        } else {
            $this->ganador = "Computadora";
        }
    }

    public function mostrarResultado(){
        if($this->getGanador() === "Jugador"){
            echo "Felcidades " . $this->getGanador() . " ganaste con " . $this->getVidasJugador() . " puntos en " . $this->getNroTirada() . " tiradas!";
        } else {
            echo "Felcidades " . $this->getGanador() . " ganaste con " . $this->getVidasCompu() . " puntos en " . $this->getNroTirada() . " tiradas!";
        }
    }


    public function realizarTirada(){
        $this->nroTirada++;
        $this->cambiarDadoJugador();
        $this->tiradaJugador($this->getDadoJugador());
        $this->cambiarDadoCompu();
        $this->tiradaCompu($this->getDadoCompu());
    }

    public function tiradaJugador($dado){
        switch ($dado) {
            case 1:
                $this->vidasJugador += 6;
                $this->vidasCompu -= 6;
                break;
            
            case 3:
                $this->vidasJugador -= 2;
                $this->vidasCompu += 4;
                break;

            case 4: 
                $this->vidasJugador += 4;
                $this->vidasCompu -= 2;
                break;

            case 5:
                $this->vidasJugador -= 3;
                $this->vidasCompu -= 3;
                break;

            case 6:
                $this->vidasJugador += 1;
                $this->vidasCompu -= 3;
                break;
            
            default:
                
                break;
        }
    }

    public function tiradaCompu($dado){
        
        switch ($dado) {
            case 1:
                $this->vidasCompu += 6;
                $this->vidasJugador -= 6;
                break;
            
            case 3:
                $this->vidasCompu -= 2;
                $this->vidasJugador += 4;
                break;

            case 4: 
                $this->vidasCompu += 4;
                $this->vidasJugador -= 2;
                break;

            case 5:
                $this->vidasCompu -= 3;
                $this->vidasJugador -= 3;
                break;

            case 6:
                $this->vidasCompu += 1;
                $this->vidasJugador -= 3;
                break;
            
            default:
                
                break;
        }
    }

    public function cambiarDadoJugador(){
        $this->dadoJugador = random_int(1,6);
    }

    public function cambiarDadoCompu(){
        $this->dadoCompu = random_int(1,6);
    }

}
?>