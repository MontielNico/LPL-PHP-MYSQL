function divisionRestasSucesivas(numero1, numero2) {
    let cociente;

    cociente = 0;

    while (numero1 >= numero2) {
        numero1 = numero2 - numero1;
        cociente += 1;
    }

    return cociente;
}

function potenciaDeNumeros(numero1,numero2){
    let resultado;

    resultado = numero1 ** numero2;

    return resultado;
}

function mostrarHoraPc(){
    let objetoDate = new Date();
    let dia = objetoDate.getDate();
    let mes = objetoDate.getMonth() + 1;
    let anio = objetoDate.getFullYear();
    let cadeFecha = " fecha: " + dia + " mes: " + mes + " año: " + anio;

    document.writeln("<h2>" + cadeFecha + "</h2>");
}

function main(){
    let numero1, numero2;

    numero1 = parseInt(prompt("Ingresar numero 1"));
    numero2 = parseInt(prompt("Ingresar numero 2"));

    if(numero1 > numero2){
        document.writeln("<h1>El resultado de la potencia es: " + potenciaDeNumeros(numero1,numero2) + "</h1>");

    } else{
        document.writeln("<h1>El resultado de la división es: " + divisionRestasSucesivas(numero2,numero1) + "</h1>");
    }

    mostrarHoraPc();
}