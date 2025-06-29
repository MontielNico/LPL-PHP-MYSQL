<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 3</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Laboratorio N°3</h1>
    </header>
    <div id="contenedor-filtros">
        <label>Producto: </label>
        <input type="text" id="input_productos" placeholder="Ingrese un producto" onkeyup="buscarProducto()">
        <label>Ubicacion: </label>
        <select id="select_ubicacion" onchange="buscarProducto()">
            <option value="0">------</option>
            <?php
            $conn = new mysqli("localhost", "root", "", "comparador");

            if($conn->connect_error){
                die("Error al conectar con la base de datos");
            }

            $sql = "SELECT ubicacion FROM supermercado GROUP BY ubicacion";

            $resu = $conn->query($sql);

            if($resu->num_rows > 0){
                while($row = $resu->fetch_object()){
                    echo "<option value ='{$row->ubicacion}'>$row->ubicacion</option>";
                }
            }

            $conn->close();
            ?>
        </select>
    </div>
    <div id="contenedor-maestro">
        <table id="id_table"></table>
    </div>
    <div id="contenedor-detalle">
        <h2 id="id_h2_detalle"></h2>
        <table id="id_table_detalle"></table>
        <p id="id_comparacion"></p>
    </div>
    <footer>
        <strong>Nicolas Montiel LPL 2025</strong>
    </footer>
    <script src="script.js"></script>
</body>
</html>