

function cuentaCaracteres(){
    const textarea = document.getElementById("id_comentarios");
    const contador = document.getElementById("caracteres");
    const maximo = textarea.maxLength;

    textarea.addEventListener('input', () =>{
        const restante = maximo - textarea.value.length;
        contador.textContent = restante;
    });
}

function validaPassword(){
    const contraseña = document.getElementById("id_password").value;
    let contadorMayus = 0;
    let contadorDigitos = 0;

    for (let i = 0; i < contraseña.length; i++) {
        const char = contraseña[i];

        if (char === char.toUpperCase() && char !== char.toLowerCase()){
            contadorMayus +=1;
        }
        
        if(!isNaN(char) && char.trim() !== ""){
            contadorDigitos +=1;
        }
    }

    if (contraseña.length > 6 && contadorDigitos > 0 && contadorMayus > 0) {
        window.alert("Formulario enviado con éxito");
        document.getElementById("miFormulario").submit();
    } else {
        window.alert("Error")
        event.preventDefault();
    }
}