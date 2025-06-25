function mostrarCiudades(){
    const valor = document.getElementById("id_selector").value;
    let contenedorRespuesta = document.getElementById("contenedor-resultados");

    if(valor === "0"){
        contenedorRespuesta.innerHTML = "Seleccionar un pais";
        return;
    }

    let xhr = new XMLHttpRequest();

    xhr.open("GET", "ciudades.php?valor=" + valor, true);

    xhr.onreadystatechange = function () {
        if(xhr.readyState === 4 && xhr.status === 200){
            contenedorRespuesta.innerHTML = xhr.responseText;
        }
    };

    xhr.send(null);
}