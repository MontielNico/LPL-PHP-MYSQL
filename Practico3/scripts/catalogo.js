function validaFormulario() {
    const formulario = document.forms[0];
    const campoTitulo = formulario.elements["inputTitulo"];
    const campoAutor = formulario.elements["inputAutor"];
    const camposTipo = document.querySelectorAll('input[type="checkbox"]');

    const valorTitulo = campoTitulo.value.trim();
    const valorAutor = campoAutor.value.trim();

    if (valorTitulo === "" || valorAutor === "" || !validaTipos(camposTipo)) {
        window.alert("Fallo de validacion");
    } else {
        window.alert("formulario enviado con exito");
    }
}

function validaTipos(campos) {
    for (let campo of campos) {
        if (campo.checked) {
            return true;
        }
    }
    return false;
}

