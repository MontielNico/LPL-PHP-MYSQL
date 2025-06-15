function esMayuscula(letra){
    return letra === letra.toUpperCase() && letra !== letra.toLowerCase();
}

function esMiniscula(letra){
    return letra === letra.toLowerCase() && letra !== letra.toUpperCase();
}

function analizaCadena(cadena){
    let contadorMinusculas = 0;
    let contadorMayusculas = 0;

    for (let index = 0; index < cadena.length; index++) {
        if (esMayuscula(cadena[index])) {
            contadorMayusculas += 1;
        } else {
            contadorMinusculas += 1;
        }
    }

    if (contadorMayusculas == cadena.length) {
        document.writeln("<h1>La cadena: " + cadena + " está escrita toda en mayúscula. </h1>");
    } else if (contadorMinusculas == cadena.length){
        document.writeln("<h1>La cadena: " + cadena + " está escrita toda en minúscula. </h1>"); 
    } else{
        document.writeln("<h1>La cadena: " + cadena + " está escrita en minúscula y mayúscula. </h1>");
    }
}

function main(){
    let cade = prompt("Ingresar cadena");

    analizaCadena(cade);
}