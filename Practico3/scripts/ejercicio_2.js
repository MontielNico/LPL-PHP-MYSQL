
function parImpar(numero){
    if (numero % 2 == 0) {
        return document.writeln("El numero es par");
    } else {
        return document.writeln("El numero es impar");
    }
}

function divisiblePor(numero){
    if (numero % 2 == 0) {
        document.writeln("divisible por 2");
    } else if (numero % 3 == 0) {
        document.writeln("divisible por 3");
    } else if(numero % 5 == 0){
        document.writeln("divisible por 5");
    }
}

function esPrimo(numero){
    if (numero < 2){
        return false;
    }
    for (let index = 2; index <= Math.sqrt(numero); index++) {
        if (numero % index === 0) return false;
    }
    return true;
}

function cadenaPrimo(numero){
    if (esPrimo(numero)){
        document.writeln("es primo");
    } else {
        document.writeln("no es primo");
    }
}

function main(){
    let numeroElegido = parseInt(prompt("Ingresar numero"));

    document.writeln("El numero ingresado es: " + numeroElegido + "<br>");

    parImpar(numeroElegido);
    divisiblePor(numeroElegido);
    cadenaPrimo(numeroElegido);

}