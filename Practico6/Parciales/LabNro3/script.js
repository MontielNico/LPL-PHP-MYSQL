function buscarProducto() {
    let producto = document.getElementById("input_productos").value;
    let ubicacion = document.getElementById("select_ubicacion").value;

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "buscarProducto.php?producto=" + producto + "&ubicacion=" + ubicacion, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const productos = JSON.parse(xhr.responseText);
            let tabla = document.getElementById("id_table");

            tabla.innerHTML = "<th>Producto</th><th>Precio</th><th>Supermercado</th><th>Ubicacion</th><th>Detalle</th>";

            productos.forEach(producto => {
                let fila = document.createElement("tr");
                fila.innerHTML = `<td class="nombreProducto">${producto.nombreP}</td>
                                <td>${producto.precio}</td>
                                <td>${producto.nombreS}</td>
                                <td>${producto.ubicacion}</td>
                                <td><button type='button'>Ver Detalle</button></td>`;

                const botones = fila.getElementsByTagName('button');

                botones[0].addEventListener('click', ()=>{
                    verDetalle(producto.nombreP);
                });

                tabla.appendChild(fila);

            });

        }
    }

    xhr.send(null);
}

function verDetalle(producto) {

    producto = decodeURIComponent(producto);

    let xhr = new XMLHttpRequest();

    xhr.open("GET", "buscarDetalle.php?producto=" + producto, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let supermercados = JSON.parse(xhr.responseText);
            console.log(JSON.parse(xhr.responseText));
            let tabla = document.getElementById("id_table_detalle");
            let detalle = document.getElementById("id_h2_detalle");

            detalle.innerHTML = "Producto: " + producto;
            tabla.innerHTML = "<th>Supermercado</th><th>Precio</th><th>Ubicacion</th>";

            supermercados.forEach(supermercado => {
                let fila = document.createElement("tr");
                fila.innerHTML = `<td>${supermercado.nombreS}</td>
                                <td class="precios">${supermercado.precio}</td>
                                <td>${supermercado.ubicacion}</td>`;

                tabla.appendChild(fila);

            });
            buscarMaxyMin();
        }
    }
    xhr.send(null);
}

function buscarMaxyMin() {
    const nodosPrecios = document.querySelectorAll('.precios');
    const precios = Array.from(nodosPrecios).map(nodo => parseFloat(nodo.textContent));

    if (precios.length === 0) return;

    let min = precios[0];
    let max = precios[0];

    for (let i = 1; i < precios.length; i++) {
        const precio = precios[i];
        if (precio < min) {
            min = precio;
        } else if (precio > max) {
            max = precio;
        }
    }

    const diferencia = max - min;
    const comparacion = document.getElementById("id_comparacion");

    comparacion.innerHTML = `Más barato: <strong>${min}</strong>  Más caro: <strong>${max}</strong>  Diferencia de: <strong>${diferencia}</strong>`;
}
