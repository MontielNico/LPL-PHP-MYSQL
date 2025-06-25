function buscarProducto() {
    let valor = document.getElementById("id_selector").value;
    let contenedor = document.getElementById("contenedor-resultados");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "buscarProducto.php", true);
    xhr.onreadystatechange = cargoInfo;
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("idProducto=" + valor);

    function cargoInfo() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let objetoProducto = JSON.parse(xhr.responseText);
            contenedor.innerHTML = "Precio: $" + objetoProducto.precio + "<br>"
                + "Stock Disponible: " + objetoProducto.stock;

        }
    }

}