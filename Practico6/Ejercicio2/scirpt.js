function buscarPersona(){
    let contenedorDatos = document.getElementById("contenedor-datos");
    let dni = document.getElementById("input-dni").value;

    let xhr = new XMLHttpRequest();

    xhr.open("GET", "buscarPersona.php?dni=" + dni, true);
    xhr.onreadystatechange = procesaPeticion;
    xhr.send(null);

    function procesaPeticion(){
        if(xhr.status === 200 && xhr.readyState === 4){
            contenedorDatos.innerHTML = xhr.responseText;
        }
    }
}
