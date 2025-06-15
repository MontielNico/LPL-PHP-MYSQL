<?php
require_once 'entrega.class.php';

class entregaLocal implements entrega{

    public function mostrarMensaje(){
        return "Podes retirar tu pedido en 30 minutos 🍕.";
    }
}
?>