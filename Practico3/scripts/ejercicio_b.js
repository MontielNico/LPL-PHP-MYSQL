function ejercicio_b(){
    let num1,num2;
    let cociente;

    num1 = parseInt(prompt("Ingresar numero 1"));
    num2 = parseInt(prompt("Ingresar numero 2"));
    cociente = 0;

    if(num1 > num2){
        document.writeln("<h1>El resultado de la potencia es: " + num1 ** num2 + "</h1>");
    } else {
        while(num2 >= num1){
            num2 = num2 - num1;
            cociente += 1;
        }

        document.writeln("<h1>El resultado de la division es: " + cociente + "</h1>");
    }

    document.writeln('<button onclick="imprimir()">HOLA</button>');

}

function imprimir(){
    document.write("<h1>HOLALAL</h1>");
}