function buscarEmpresas(){
    let origen = document.getElementById("id_select_1").value;

    let xhr = new XMLHttpRequest();

    xhr.open("GET","buscarEmpresas.php?origen=" + origen, true);

    xhr.onreadystatechange = function(){
        let select2 = document.getElementById("id_select_2");

        //si sale todo bien
        if(xhr.status == 200 && xhr.readyState == 4){
            let destinos = JSON.parse(xhr.responseText);
            select2.innerHTML = "";
            select2.innerHTML = "<option value=0>-----</option>"
            destinos.forEach(destino => {
                let option = document.createElement("option");
                option.value = destino.ciudadDestinoServicio;
                option.textContent = destino.ciudadDestinoServicio;
                select2.appendChild(option);
            });
            listarEmpresas();
        }
    }
    xhr.send(null);
}

function listarEmpresas(){
    let origen = document.getElementById("id_select_1").value;
    let destino = document.getElementById("id_select_2").value;
    let xhr = new XMLHttpRequest();

    xhr.open("GET", "listarEmpresas.php?origen=" + origen +"&destino=" + destino, true);

    xhr.onreadystatechange = function(){
        if(xhr.status == 200 && xhr.readyState == 4){
            let empresas = JSON.parse(xhr.responseText);
            let tablaEmpresas = document.getElementById("id_table_empresa");
            tablaEmpresas.innerHTML = `<tr><th>Logo</th><th>Empresa</th><th>Pais</th><th>Web</th><tr>`;
            empresas.forEach(empresa =>{
                let empresaUl = document.createElement("tr");
                empresaUl.innerHTML = `
                <td><img src="${empresa.logoEmpresa}" onclick="listarServicios(${empresa.idEmpresa})" class="img_empresa"></td>
                <td>${empresa.nombreEmpresa}</td>
                <td>${empresa.paisEmpresa}</td>
                <td><a href="${empresa.webEmpresa}">${empresa.webEmpresa}</a></td>`;

                tablaEmpresas.appendChild(empresaUl);
            })
        }
    }

    xhr.send(null);
}

function listarServicios(idEmpresa){
    let detalle = document.getElementById("contenedor-detalle");
    let origen = document.getElementById("id_select_1").value;
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "listarServicios.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            let servicios = JSON.parse(xhr.responseText);
            console.log(JSON.parse(xhr.responseText));
            let tabla = document.getElementById("id_table");
            tabla.innerHTML = `<tr><th>Nro Servicio</th><th>Estacion Origen</th><th>Estacion Destino</th><th>Salida</th><th>Llegada</th><th>Frecuencia</th><th>Precio</th></tr>`;
            servicios.forEach(servicio => {
                let tr = document.createElement("tr");
                tr.innerHTML = `
                <td>${servicio.nroServicio}</td>
                <td>${servicio.estacionOrigenServicio}</td>
                <td>${servicio.estacionDestinoServicio}</td>
                <td>${servicio.horaSalidaServicio}</td>
                <td>${servicio.horaLlegadaServicio}</td>
                <td>${servicio.frecuenciaServicio}</td>
                <td>${servicio.precioServicio}</td>`;
                tabla.appendChild(tr);
            });
            
        }
    }

    let datos = "idEmpresa=" + idEmpresa + "&origen=" + origen;

    xhr.send(datos);

}