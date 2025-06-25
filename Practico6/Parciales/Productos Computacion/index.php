<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos Computación</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Productos de Computación</h1>
    </header>
    <div class="container">
        <form>
            <label>Seleccionar Producto: </label>
            <select name="selector-productos" id="id_select" onchange="datosProducto()">
                <option value="0">------</option>
                <?php
                $conn = new mysqli("localhost","root","","computacion");
                $sql = "SELECT codigo, nombreProducto FROM producto";
                $resu = $conn->query($sql);

                if($resu->num_rows > 0){
                    while($row = $resu->fetch_assoc()){
                        echo "<option value='{$row['codigo']}'>{$row['nombreProducto']}</option>";
                    }
                }

                $conn->close();
                ?>
            </select>
        </form>
    </div>
    <div id="contenedor-datos">
    </div>
    <div id="contenedor-stock">
        <form action="" id="id_form">
            <table id="id_table"></table>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>