//Funcionamiento del Parking

//Evento de carga de la pagina
window.addEventListener("load", function() {
    //Cargamos el localStorage de Parking 
    // var parking = new parking();
    //parking.recuperar();
    //console.log(parking);

    //Cogemos el evento de CTRL+E y CTRL+S
    window.addEventListener("keydown", function(event) {
        console.log(event)
        if (event.ctrlKey === true && event.key === "e") {
            event.preventDefault();
            event.stopPropagation();
            document.getElementById("matriculaE").focus();
        } else if (event.ctrlKey === true && event.key === "s") {
            event.preventDefault();
            event.stopPropagation();
            document.getElementById("matriculaS").focus();
        } else if (event.ctrlKey === true) {
            event.preventDefault();
            event.stopPropagation();
        }
    })

    var entrada = document.getElementById("matriculaE");
    var salida = document.getElementById("matriculaS");

    entrada.addEventListener("keydown", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            event.stopPropagation();
            alert("entrada");
        }
    })

    salida.addEventListener("keydown", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            event.stopPropagation();
            alert("salida");
        }
    })



})