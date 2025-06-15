const inputNombre = document.getElementById('id_nombre');
const inputApellido = document.getElementById('id_apellido');
const btnRegistro = document.getElementById('id_botonIngreso');

btnRegistro.addEventListener("click", () => {
    const nombre = inputNombre.value;
    const apellido = inputApellido.value;

    verificaSesion(nombre,apellido);
    mostrarResultado();
});

function verificaSesion(nombre,apellido){
    const fecha = new Date().toLocaleString("es-AR");
    if(localStorage.getItem("nombre") !== nombre || localStorage.getItem("apellido") !== apellido){
        localStorage.setItem("nombre", nombre);
        localStorage.setItem("apellido", apellido);
        localStorage.setItem("visitas", 1);
        localStorage.setItem("ultima-visita", fecha);
    } else {
        let visitas = parseInt(localStorage.getItem("visitas") || 0) + 1;
        localStorage.setItem("visitas", visitas);
        localStorage.setItem("ultima-visita", fecha);
    }
}

function mostrarResultado(){
    const contenedor = document.getElementById('contenedor-registro');

    contenedor.innerHTML = "<p>Bienvenido " + localStorage.getItem("nombre") + " " + localStorage.getItem("apellido") + "</p><br>" + "<p> Visitas: " + localStorage.getItem("visitas") + " Ultima visita: " + localStorage.getItem("ultima-visita") + "</p>";
}