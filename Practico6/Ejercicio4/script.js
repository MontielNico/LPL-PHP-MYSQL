function buscarCiudades(){

let pais = document.getElementById("id_selectorPaises").value;

let xhr = new XMLHttpRequest();

xhr.open("GET","ciudades.php?pais="+pais,true);

xhr.onreadystatechange = function(){
    let selectorCiudades = document.getElementById("id_selectorCiudades");
    selectorCiudades.innerHTML = "";
    if(xhr.status === 200 && xhr.readyState === 4){
        let ciudades = JSON.parse(xhr.responseText);
        ciudades.forEach(ciudad => {
            let option = document.createElement("option");
            option.value = ciudad;
            option.textContent = ciudad;
            selectorCiudades.appendChild(option);
        });
    }
}

xhr.send(null);
}