window.addEventListener("load", function() {
  var btn = document.getElementById("boton");
  btn.onclick = function() {
    var i;
    var id = document.querySelectorAll("input")[0].value;
    var nombre = document.querySelectorAll("input")[1].value;
    var apellido = document.querySelectorAll("input")[2].value;
    var FechaNac = document.querySelectorAll("input")[3].value;
    if (id == "" || nombre == "" || apellido == "" || FechaNac == "") {
      alert("Rellena los campos");
    }
    if (aFecha(FechaNac) < new Date()) {
      //comprobar el ID

      var fila =
        "<tr><td>" +
        id +
        "</td><td>" +
        nombre +
        "</td><td>" +
        apellido +
        "</td><td>" +
        FechaNac +
        "</td></tr>";

      var btnn = document.createElement("tr");
      btnn.innerHTML = fila;
      document.getElementById("listado").appendChild(btnn);
      document.getElementById("clientes").reset();
      document.getElementsByName("id")[0].focus();

      var rows = document.getElementsByTagName("table")[0].getElementsByTagName('tbody')[0].getElementsByTagName('tr');
      for (i = 0; i<rows.length; i++) {
            rows[i].ondblclick= function() {
                alert(this)
                var idd = document.querySelectorAll("input")[0];
                var nombred = document.querySelectorAll("input")[1];
                var apellidod = document.querySelectorAll("input")[2];
                var FechaNacd = document.querySelectorAll("input")[3];
    
                idd=celdas[0];
                nombred=celdas[1];
                apellidod=celdas[2];
                FechaNacd=celdas[3];
                
            }
       // rows[i].onclick = function() {
        //    btnn.innerHTML+="<td> <button onclick='arriba()'>ARRIBA</button>" +
         //   "<button onclick='abajo()'>ABAJO</button></td>"
        //}

        
    }
    } else {
      alert("Fecha por encima de la actual");
    }
  };

  //Funciones que utilizo en la validación
  function aFecha(fecha) {
    if (FechaValida(fecha)) {
      modfecha = fecha.split("/");
      var d = modfecha[0];
      var m = modfecha[1];
      var y = modfecha[2];

      var Fecha = new Date(y, m - 1, d);

      return Fecha;
    } else {
      alert("fecha invalida");
    }
  }

  function FechaValida(fecha) {
    var modfecha = fecha.split("/");
    var d = modfecha[0];
    var m = modfecha[1];
    var y = modfecha[2];
    return (
      m > 0 &&
      m < 13 &&
      y > 0 &&
      y < 32768 &&
      d > 0 &&
      d <= new Date(y, m, 0).getDate()
    );
  }



});
