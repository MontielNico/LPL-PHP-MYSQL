<?php
class Calculadora { 
    public static function verficarCentroNumerico(int $numero){
        //por las dudas aca chequeo de nuevo que el numero sea mayor a 1
    if($numero>1){
        $sumatoriaIzquierda = 0;
        $sumatoriaDerecha = 0;
        for($i=1;$i<$numero;$i++){
            $sumatoriaIzquierda +=$i;
        }
        $j = $numero +1;
          while($sumatoriaDerecha<$sumatoriaIzquierda){
            $sumatoriaDerecha +=$j;
            $j +=1;
        } 
        if($sumatoriaDerecha == $sumatoriaIzquierda){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        return false;
    }
    }
    public static function verificarCercania (int $numero){
        for($i=1;$i<=5;$i++){
            if(self::verficarCentroNumerico(($numero +$i))){
                return true;
            }
            //no me preocupo porque se salga de rango, porque eso ya esta 
            //chequeado en la otra funcion
            if(self::verficarCentroNumerico($numero -$i)){
                return true;
            }
        }

    }
}
?>