<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suscripcion Deportiva</title>
</head>
<body>
    <?php
    if(isset($_POST['edad'], $_POST['evento']) && $_POST['edad'] >= 18){
        echo '<h1>Comprobante Suscripcion</h1>';
        echo 'Nombre: ' . $_POST['nombre'] .'<br>';
        echo 'Apellido: ' . $_POST['apellido'].'<br>';
        echo 'Sexo: ' . $_POST['sexo'].'<br>';
        echo 'Edad: ' . $_POST['edad'].'<br>';
        echo 'Telefono: ' . $_POST['telefono'].'<br>';
        echo 'E-mail: ' . $_POST['email'].'<br>';
        echo 'Evento: ' . $_POST['evento'].'<br>';
        echo 'Fecha de realizacion: ' . $_POST['fechaEvento'].'<br>';
        echo 'Lugar: ' . $_POST['lugarEvento'].'<br>';
    } else {
    ?>
    <h2>Suscripción a Evento</h2>
    <form action="suscripcionDeportiva.php" method="post">
        <h3>Informacion Personal</h3>
        <label for="nombre">Nombre :</label>
        <input type="text" name="nombre"> <br>
        <label for="apellido">Apellido :</label>
        <input type="text" name="apellido"> <br>
        <label for="sexo">Sexo: </label>
        <select name="sexo" id="id_sexo">
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select> <br>
        <label for="edad">Edad</label>
        <input type="number" name="edad"> <br>
        <label for="telefono">Telefono: </label>
        <input type="number" name="telefono"> <br>
        <label for="email">Email: </label>
        <input type="email" name="email">
        <hr>
        <h3>Seleccionar Evento</h3>
        <label for="evento">Evento</label>
        <select name="evento" id="id_evento">
            <option value="Torneo de Tenis">Torneo de Tenis</option>
            <option value="Campeonato de Ajedrez">Campeonato de Ajedrez</option>
            <option value="Campeonato Escolar">Campeonato Escolar</option>
        </select> <br>
        <label for="fechaEvento">Seleccionar Fecha: </label>
        <input type="date" name="fechaEvento"> <br>
        <label for="lugarEvento">Lugar: </label>
        <select name="lugarEvento" id="id_lugarEvento">
            <option value="Comodoro">Comodoro</option>
            <option value="Rada Tilly">Rada Tilly</option>
        </select> <br>
        <button type="submit">Enviar</button>
    </form>
    <?php
    }
    ?>
</body>
</html>