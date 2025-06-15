<?php
session_start();

include("clases/pizza.class.php");

$pizza1 = new pizza("Muzzarella","pizza de queso muzzarella muy rica",150,"IMAGENPIZZA");
$pizza2 = new pizza("Cuatro Quesos","pizza de cuatro quesos muy rica",250,"IMAGENPIZZA");
$pizza3 = new pizza("Napolitana","pizza de queso muzzarella con jamon y tomate",300,"IMAGENPIZZA");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria</title>
</head>
<body>
    <h1>Delivery de Pizza</h1>
    <h2>Menu del dia</h2>
    <?php
    $pizza1->imprimirPizza();
    $pizza2->imprimirPizza();
    $pizza3->imprimirPizza();
    ?>
    <br>
    <h3>Realizar Pedido</h3>
    <form action="procesaPedido.php" method="POST">
        <fieldset>
            <legend>Seleccionar Pizzas</legend>
            <label for="pizzas">Pizzas</label>
            <label for="muzzarella">Muzzarela: </label> <input type="number" name="cantidades[muzzarella]" min=0><br>
            <label for="napolitana">Napolitana: </label>
            <input type="number" name="cantidades[napolitana]" min=0><br>
            <label for="cuatro_quesos">Cuatro Quesos</label>
            <input type="number" name="cantidades[cuatro_quesos]" min=0>
        </fieldset>
        <fieldset>
            <legend>Tipo de Entrega</legend>
            <select name="entrega" id="id_entrega">
                <option value="retiro">Retiro en local</option>
                <option value="domicilio">Entrega a domicilio</option>
            </select>
        </fieldset>
        <button type="submit">Realizar Pedido</button>
    </form>
    
</body>
</html>