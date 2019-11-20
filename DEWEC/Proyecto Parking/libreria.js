//Funcionamiento del Parking

//Evento de carga de la pagina
window.addEventListener("load", function() {
  var parking = new Parking();
  parking.recuperar();

  setInterval(RellenaTabla, 1000);
  var expresionmatr = "/(([A-Z]{1,2})(d{4})([A-Z]{0,2}))|((E)(d{4})([A-Z]{3})/";
  document.getElementById("matE").focus();

  //Cogemos el evento de CTRL+E y CTRL+S
  window.addEventListener("keydown", function(event) {
    console.log(event);

    //Si el evento es CTRL+E mueve a la entrada
    if (event.ctrlKey === true && event.key === "e") {
      event.preventDefault();
      event.stopPropagation();
      document.getElementById("matE").focus();

      //Si el evento es CTRL+S mueve a la Salida
    } else if (event.ctrlKey === true && event.key === "s") {
      event.preventDefault();
      event.stopPropagation();
      document.getElementById("matS").focus();

      //Si es control no hace naica
    } else if (event.ctrlKey === true) {
      event.preventDefault();
      event.stopPropagation();
    }
  });

  var entrada = document.getElementById("matE");
  var salida = document.getElementById("matS");

  //pulsar intro en el campo de texto de entrada
  entrada.addEventListener("keydown", function(event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      event.stopPropagation();
      var mat = document.getElementById("matE");
      if (/(\d{4})([A-Z]{3})/.test(mat.value)) {
        var coche = new Coche(mat.value);
        mat.value = "";
        mat.focus();
        parking.entra(coche);
        parking.almacena();
        parking.recuperar();
        RellenaTabla(parking);
      } else {
        alert("Introduce una matricula de un formato valido");
        mat.value = "";
      }
    }
  });

  //pulsar intro en el campo de texto de salida

  salida.addEventListener("keydown", function(event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      event.stopPropagation();
      var mat = document.getElementById("matS");
      if (/(\d{4})([A-Z]{3})/.test(mat.value)) {
        vehiculo = parking.devolverCoche(mat.value);
        if (parking.comprobarExistente(vehiculo)) {
          ImprimeTicket(vehiculo);
          parking.sale(vehiculo);
          parking.almacena();
          parking.recuperar();
          RellenaTabla(parking);
          mat.value = "";
        } else {
          alert("No esta aparcado0");
        }
      } else {
        alert("Introduce una matricula de un formato valido");
        mat.value = "";
      }
    }
  });

  //esta función RELLENA UNA TABLA, vaya, quien lo diría, eh?
  function RellenaTabla() {
    var tabla = document.getElementById("listado");
    tabla.innerHTML = "";
    listap = parking.aparcados;
    for (var i = 0; i < listap.length; i++) {
      fecha = new Date(listap[i].entrada);
      document.getElementById("listado").insertRow(-1).innerHTML =
        "<td>" +
        listap[i].mat +
        "</td><td>" +
        fecha.toLocaleString() +
        "</td><td>" +
        parking.CalcularPrecioTotal(listap[i]) +
        " €</td>";
    }
  }

  // Funcion que imprime en pantalla el ticket del coche junto a la matricula, fecha de entrada y el precio
  function ImprimeTicket(vehiculo) {
    money = parking.CalcularPrecioTotal(vehiculo);
    zonat = document.getElementById("ticket");
    fecha = new Date(vehiculo.entrada);
    zonat.innerHTML =
      "<table border='1px'><tr><td>ticket</td></tr><td><p>Matricula: <br>" +
      vehiculo.mat +
      "</p><p> Fecha de Entrada: <br>" +
      fecha.toLocaleString() +
      "</p><p> Precio Final:" +
      money +
      " €</p></td></table>";

    setTimeout(BorraTicket, 10000);
  }

  function BorraTicket() {
    zonat = document.getElementById("ticket");
    zonat.innerHTML = "";
  }
});
