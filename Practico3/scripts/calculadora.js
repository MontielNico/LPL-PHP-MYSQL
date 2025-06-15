
let expresion = '';

function agregar(valor){
    expresion = expresion + valor;
    document.getElementById('id_pantalla').value = expresion;
}

function borrar(){
    document.getElementById('id_pantalla').value = 0;
    expresion = '';
}

function calcular(){
    try {
        const resultado = eval(expresion);
        document.getElementById('id_pantalla').value = resultado;
        expresion = '';
    } catch (error) {
        document.getElementById('id_pantalla').value = 'Error';
    }
}