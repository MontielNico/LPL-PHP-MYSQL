<?php
include_once "Pedido.class.php";
if(isset($_POST['btnEnviar'])){
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $pais = $_POST['pais'];

    $pedido = new Pedido($producto,$cantidad,$pais);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
        $pedido->mostrarResultados();
    ?>
</body>
</html>