const filas = 2;
const columnas = 2;
const imagenes = ['imgs/1.webp', 'imgs/2.webp', 'imgs/3.webp', 'imgs/4.webp'];

let galeria = document.getElementById('galeria');
let dialog = document.getElementById('pantalla');
let imagenAmpliada = document.getElementById('imagen-grande');


imagenes.forEach(src => {
    let img = document.createElement('img');
    img.src = src;
    img.alt = "miniatura";

    img.onclick = () => mostrarImagen(src);

    galeria.appendChild(img);
})


function mostrarImagen(src){
    imagenAmpliada.src = src;
    dialog.showModal();
}