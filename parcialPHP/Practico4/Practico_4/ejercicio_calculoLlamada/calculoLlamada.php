<?php

function calcularLlamada($importe,$minutos){
    $total = 45.50;

    if($minutos > 3){
        return $total = $importe * $minutos;
    } else{
        return $total;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo llamada</title>
</head>
<body>
    <?php
        if(isset($_POST['destino'], $_POST['minutos'])){
            echo "<h1> Calculo Llamada </h1> <br>";
            echo "Total: " . calcularLlamada($_POST['destino'], $_POST['minutos']);
        } else{
            ?>
            <form action="calculoLlamada.php" method="post">
                <label for="destino">Destino</label>
                <select name="destino" id="id_destino">
                    <option value="30.5">Bariloche</option>
                    <option value="50.5">Comodoro</option>
                </select> <br>
                <label for="minutos">Cant Minutos</label>
                <input type="number" name="minutos"> <br>
                <button type="submit">Enviar</button>

            </form>
             <?php
        }
    ?>
        
</body>
</html>