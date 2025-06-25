function datosProducto(){
    let xhr = new XMLHttpRequest();
    let producto = document.getElementById("id_select").value;

    xhr.open("GET", "procesarProducto.php?codigoProducto=" + producto, true);

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
        let datos = JSON.parse(xhr.responseText);
        let html = '<h3>Datos del Producto</h3>' +
                    '<p>Nombre del Producto: ' + datos.nombreProducto + '</p>'+
                    '<p>Proveedor: ' + datos.proveedor + '</p>' +
                    '<p id="total_stock">Total Producto en stock: ' + datos.stockTotal + '</p>';
        document.getElementById("contenedor-datos").innerHTML = html;
        }
        listarFormulario();
    }

    xhr.send(null);
}

function listarFormulario(){
    let xhr = new XMLHttpRequest();
    let producto = document.getElementById("id_select").value;

    xhr.open("GET", "listaFormulario.php?codigoProducto="+producto, true);

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            let datos = JSON.parse(xhr.responseText);
            let tabla = document.getElementById("id_table");
            let html = "<tr><th>Sucursal</th><th>Stock</th><th>Cantidad</th><th>Actualizar</th></tr>";
            datos.forEach(dato => {
                html += "<tr><td>"+dato.sucursal+"</td><td id='stock-" + dato.sucursal + "'>"+dato.cantidad+"</td><td><input type='number' name='cantidad' id='input_cantidad_" + dato.sucursal.trim() + "'></td><td><button type='button' onclick='actualizarStock(\""+ dato.sucursal +"\")'>Actualizar</button></td></tr>";
            });
            tabla.innerHTML = html;
        }
    }

    xhr.send(null);
}

function actualizarStock(sucursal){
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "actualizarStock.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function(){
        if(xhr.status == 200 && xhr.readyState == 4){
            let stockActualizado = JSON.parse(xhr.responseText);
            console.log(JSON.parse(xhr.responseText));
            document.getElementById("total_stock").innerHTML = 'Total Producto en stock: ' + stockActualizado[1].stockTotal;
            document.getElementById("stock-" + sucursal).innerHTML = stockActualizado[0];
        }
    }

    let datos = "codigoProducto=" + document.getElementById("id_select").value +
            "&sucursal=" + sucursal +
            "&cantidad=" + document.getElementById("input_cantidad_"+ sucursal).value;

    xhr.send(datos);
}