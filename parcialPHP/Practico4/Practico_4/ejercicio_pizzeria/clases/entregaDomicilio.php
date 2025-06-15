<?php
require_once 'entrega.class.php';


class entregaDomicilio implements entrega{
    public function mostrarMensaje(){
        return "Tu pedido será entregado a domicilio 🏠";
    }
}
?>