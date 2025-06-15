
function login() {
    let usuario = document.getElementById("input_usuario").value;
    let contraseña = document.getElementById("input_password").value;

    if (usuario == localStorage.getItem("usuario") && contraseña == localStorage.getItem("contraseña")) {
        window.location = "ejercicio_13_b.html";

    } else {
        window.alert("Usuario o contraseña incorrecta");
    }
}

function register() {
    let usuario = document.getElementById("input_registroUsuario").value;
    let contraseña = document.getElementById("input_registroPassword").value;

    localStorage.setItem("usuario", usuario);
    localStorage.setItem("contraseña", contraseña);

    window.location = "ejercicio_13_b.html";
}

function cargaLista() {
    let mensajeBienvenida = document.getElementById("mensaje_bienvenida");
    let lista = document.getElementById("id_lista");
    let usuario = localStorage.getItem("usuario");
    let lista_utiles = JSON.parse(localStorage.getItem("utiles")) || [];

    mensajeBienvenida.innerHTML = `<h1>Bienvenido: ${usuario}</h1>`;

    if (lista_utiles.length !== 0) {
        lista_utiles.forEach((element) => {
            let item = document.createElement("li");
            item.textContent = element;

            let btnBorrar = document.createElement("button");
            btnBorrar.textContent = "❌";
            btnBorrar.style.marginLeft = "10px";

            btnBorrar.addEventListener("click", () => {

                item.remove();

                let nuevaLista = lista_utiles.filter(util => util !== element);


                localStorage.setItem("utiles", JSON.stringify(nuevaLista));


                lista_utiles = nuevaLista;
            });

            item.appendChild(btnBorrar);
            lista.appendChild(item);
        });
    }
}

function agregarUtil() {
    let util = document.getElementById("input_utiles").value;

    let listaUtiles = JSON.parse(localStorage.getItem("utiles")) || [];

    let lista = document.getElementById("id_lista");
    let item = document.createElement("li");

    item.textContent = util;

    listaUtiles.push(util);
    localStorage.setItem("utiles", JSON.stringify(listaUtiles));

    let btnBorrar = document.createElement("button");
    btnBorrar.textContent = "❌";
    btnBorrar.style.marginLeft = "10px";

    btnBorrar.addEventListener("click", () => {
        item.remove();

        let listaActual = JSON.parse(localStorage.getItem("utiles")) || [];

        let index = listaActual.indexOf(util);
        if (index > -1) {
            listaActual.splice(index, 1);
        }

        localStorage.setItem("utiles", JSON.stringify(listaActual))
    });

    item.appendChild(btnBorrar);
    lista.appendChild(item);

    document.getElementById("input_utiles").value = "";

}

function borrarTodo(){
    localStorage.removeItem("utiles");
    document.getElementById("id_lista").innerHTML = "";
}