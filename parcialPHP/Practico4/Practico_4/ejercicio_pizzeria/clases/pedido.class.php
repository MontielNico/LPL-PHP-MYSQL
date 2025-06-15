<?php
class pedido{
    private $cantidades;
    private $pizzas;
    private $entrega;

    public function __construct($cantidades,$pizzas, $entrega){
        $this->cantidades = $cantidades;
        $this->pizzas = $pizzas;
        $this->entrega = $entrega;
    }

    public function mostrarResumen(){
        $total = 0;
        echo "<h2> Resumen del Pedido:</h2>";

        foreach ($this->cantidades as $nombre => $cantidad){
            if($cantidad > 0 && isset($this->pizzas[$nombre])){
                $pizza = $this->pizzas[$nombre];
                $subtotal = $cantidad * $pizza->getPrecio();
                $total += $subtotal;

                echo "🍕 " . ucfirst($pizza->getNombre()) . ": $cantidad x $" . $pizza->getPrecio();
            }
            echo "<br><br>";
        }

        echo "<br><strong>Total: $". $total ."</strong><br>";

        echo "<br>".$this->entrega->mostrarMensaje();
    }
}
?>