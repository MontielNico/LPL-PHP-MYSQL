let arrayInputs = [];

function agregarInputs(){
    let confirmacion = prompt('Agregar Input?');

    while (confirmacion != null){
        arrayInputs.push(confirmacion);
        confirmacion = prompt('Agregar Input?');
    }

    crearInputs();
}

function crearInputs(){
    espacio_inputs = document.getElementById("id_inputs");
    arrayInputs.forEach(input =>{
        espacio_inputs.innerHTML += `<label>${input}</label><input type="text"><br>`;
    });
}