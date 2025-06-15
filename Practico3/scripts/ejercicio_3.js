function calculoLetra(dni){
    const vectorLetras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

    return vectorLetras[dni % 23];
}

function validacionLetra(letra, dni){
    if(dni < 0 || dni > 99999999){
        return false;
    } else if(letra != calculoLetra(dni)){
        return false;
    } else{
        return true;
    }
}

function main(){
    dni = parseInt(prompt("Ingrese su numero de dni"));
    letra = (prompt("Ahora ingrese la letra referida."));

    if (validacionLetra(letra,dni)) {
        document.writeln("<h1> Le damos la bienvenida </h1>");
    } else {
        document.writeln("<h1>Ingreso de datos invalido</h1>");
    }
}