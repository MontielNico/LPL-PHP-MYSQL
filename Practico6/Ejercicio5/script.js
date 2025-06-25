function BuscarProductos(){
    let texto  = document.getElementById("id_input").value;

    let xhr = new XMLHttpRequest();

    xhr.open("GET","productos.php?texto=" + texto, true);

    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            let sugerencias = JSON.parse(xhr.responseText);
            let html = "<ul>";
            sugerencias.forEach(sugerencia => {
                html += "<li>" + sugerencia.descripcion + "</li>";
            });

            html += "</ul>";
            document.getElementById("contenedor-sugerencias").innerHTML = html;
        }
    }

    xhr.send(null);

}