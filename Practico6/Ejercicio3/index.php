<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Producto</title>
    <script src="escrip.js"></script>
</head>
<body>
    <h1>Buscar Producto</h1>
    <div id="contenedor-formulario">
        <form id="id_formulario">
        <select id="id_selector" onchange="buscarProducto()">
            <option value="0">------</option>
            <?php
            $conn = new mysqli("localhost", "root", "", "franquicia");
            $res = $conn->query("SELECT nroProducto, descripcion FROM producto");
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                    echo "<option value='{$row['nroProducto']}'>{$row['descripcion']}</option>";
                }
            }
            ?>
        </select>
        <button type="submit">enviar</button>
        </form>
    </div>
    <div id="contenedor-resultados"></div>
</body>
</html>