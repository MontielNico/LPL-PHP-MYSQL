const inputNombre = document.getElementById("id_nombre");
const inputApellido = document.getElementById("id_apellido");
const botonEnviar = document.getElementById("id_botonIngreso");

function crearCookie(nombre, valor, dias){
    const fecha = new Date();
    fecha.setTime(fecha.getTime() + (dias*24*60*60*1000));

    let expires = "expires=" + fecha.toUTCString();
    document.cookie = `${nombre}=${valor};${expires};path=/`;
}

function leerCookie(nombre) {
    const cookies = document.cookie.split("; ");
    for (let i = 0; i < cookies.length; i++) {
        const [clave, valor] = cookies[i].split("=");
        if (clave === nombre) {
            return valor;
        }
    }
    return null;
}


botonEnviar.addEventListener("click", ()=>{
    let nombre = inputNombre.value;
    let apellido = inputApellido.value;
    const nombreCookie = nombre+apellido;
    const fecha = new Date().getDate;

    if(leerCookie("usuario") == null){
        crearCookie("usuario", nombreCookie,10);
        crearCookie("visitas", 1, 10);
        crearCookie("ultima_visita", fecha.toUTCString(),10);
        mostrarDatos(nombre,apellido);
    } else {
        let cantVisitas = parseInt(leerCookie("visitas") || 0);
        cantVisitas++;
        crearCookie("visitas", cantVisitas, 10);
        mostrarDatos(nombre,apellido);
    }
})

function mostrarDatos(nombre, apellido){
    const contenedor = document.getElementById("contenedor-registro");
    contenedor.innerHTML = "<p>Bienvenido " + nombre + " " + apellido + "</p><br>" +
                           "<p>Cant Visitas: " + leerCookie("visitas") + "</p><br>" + 
                           "<p>Ultima visita: " + leerCookie("ultima_visita") + "</p>";

}