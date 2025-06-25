<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
    <h1>Realizar Pedido</h1>
    <div id="contenedor-formulario">
        <form action="form.php" method="post">
            <label>Seleccionar Producto: </label>
            <select id="id_selectorProductos" name="producto">
                <option value="0">------</option>
            <?php
            $conn = new mysqli("localhost", "root", "", "franquicia");
            $res = $conn->query("SELECT nroProducto, descripcion FROM producto");
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                    echo "<option value='{$row['nroProducto']}' name='{$row['descripcion']}'>{$row['descripcion']}</option>";
                }
            }
            ?>
            </select> <br>
            <label>Cantidad: </label> <input type="number" id="input_cantidad" name="cantidad"> <br>
            <hr>

            <label>Seleccionar Pais: </label>
            <select id="id_selectorPaises" onchange="buscarCiudades()" name="pais">
                <option value="0">-------</option>
            <?php
            $conn = new mysqli("localhost", "root", "", "paises");
            $res = $conn->query("SELECT idPais, nombre FROM pais");
            if($res->num_rows > 0){
                while($row = $res->fetch_assoc()){
                    echo "<option value='{$row['idPais']}' name='{$row['nombre']}'>{$row['nombre']}</option>";
                }
            }
            ?>
            </select> <br>
            <label>Ciudad: </label> 
            <select id="id_selectorCiudades"><br>
                
            </select> <br>

            <button type="submit" name="btnEnviar">Enviar</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>