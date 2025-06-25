<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RailEurope</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h1>RailEurope</h1>
    <div id="contenedor-filtros">
        <label>Origen: </label>
        <select name="filtro_1" id="id_select_1" onchange="buscarEmpresas()">
            <option value="0">-----</option>
            <?php
            $conn = new mysqli("localhost","root","","raileurope");
            $sql = "SELECT ciudadOrigenServicio FROM servicios GROUP BY ciudadOrigenServicio";

            $resu = $conn->query($sql);

            if($resu->num_rows > 0){
                while($row = $resu->fetch_assoc()){
                    echo "<option value='{$row['ciudadOrigenServicio']}'>{$row['ciudadOrigenServicio']}</option>";
                }
            }
            $conn->close();
            ?>
        </select>
        <select name="filtro_2" id="id_select_2" onchange="listarEmpresas()">
            <label>Destino: </label>
            <option value="0">-----</option>
        </select>
    </div>
    <div id="contenedor-maestro">
        <h2>Lista Empresas</h2>
        <table id="id_table_empresa"></table>
    </div>
    <div id="contenedor-detalle">
        <h2>Detalle Servicios</h2>
        <table id="id_table"></table>
    </div>
    <script src="script.js"></script>
</body>
</html>