//Libreria para el mantenimiento de tablas

//Ordena Tablas (Solo un sentido)
HTMLTableElement.prototype.ordenar = function(col, tipo) {
  var filas = this.tBodies[0].rows;
  var vector = [];
  var i = 0;

  for (i = 0; i < filas.length; i++) {
    vector[i] = filas[i];
  }
  switch (tipo) {
    case "cadena":
      vector.sort(function(a, b) {
        return a.cells[col].innerHTML.localeCompare(b.cells[col].innerHTML);
      });
      break;
    case "numero":
      vector.sort(function(a, b) {
        return a.cells[col].innerHTML - b.cells[col].innerHTML;
      });
      break;
    case "fecha":
      vector.sort(function(a, b) {
        var fecha1 = a.cells[col].innerHTML.split("/");
        var fecha2 = b.cells[col].innerHTML.split("/");

        return (
          new Date(fecha1[2], fecha1[1], fecha1[0]) -
          new Date(fecha2[2], fecha2[1], fecha2[0])
        );
      });
  }
  vector.sort();

  for (i = 0; i < vector.length; i++) {
    this.tBodies[0].appendChild(vector[i]);
  }
};

//Editar Tablas
HTMLTableCellElement.prototype.editar = function() {
  var texto = this.innerHTML;
  var input = document.createElement("input");
  input.type = "text";
  input.value = texto;
  input.onblur = function() {
    var texto = this.value;
    this.parentNode.innerHTML = texto;
  };
  this.innerHTML = "";
  this.appendChild(input);
};

//Evento para ordenar las tablas al pulsar sobre el nombre de la columna
window.addEventListener("load", function() {
  var tablas = document.querySelectorAll("table.ordenable");
  var i, j;
  var ths;
  function clicadoColumna(columna) {
    return function(ev) {
      var tipoO = this.getAttribute("class");
      if (/fecha/i.test(tipoO)) {
        tablas[0].ordenar(columna, "fecha");
      } else if (/numero/i.test(tipoO)) {
        tablas[0].ordenar(columna, "numero");
      } else {
        tablas[0].ordenar(columna, "cadena");
      }
    };
  }

  for (i = 0; i < tablas.length; i++) {
    ths = tablas[i].querySelectorAll("tr.cabecera th");
    for (j = 0; j < ths.length; j++) {
      ths[j].onclick = clicadoColumna(j);
    }
  }

  var tablas = document.querySelectorAll("table.editable");
  for (i = 0; i < tablas.length; i++) {
    var tds = tablas[i].getElementsByTagName("td");
    for (j = 0; j < tds.length; j++) {
      tds[j].ondblclick = function() {
        this.editar();
      };
    }
  }

  var filas = document.querySelectorAll("table.borrable tbody tr");
  for (i = 0; i < filas.length; i++) {
    var td = document.createElement("td");
    var boton = document.createElement("button");
    boton.innerText = "Borrar";
    filas[i].appendChild(td);
    td.appendChild(boton);

    boton.addEventListener("click", function borrar() {
      this.parentNode.parentNode.remove();
    });
  }

  //Insertar En la tabla

  var tabla = document.querySelectorAll("table.insertable")[0];
  var tfoot = document.querySelectorAll("table.insertable tfoot");
  var columnas = tabla.rows[0].cells.length;
  var tr = document.createElement("tr");
  var td;
  for (i = 0; i <= columnas; i++) {
    td = document.createElement("td");
    if (i == columnas) {
      td.innerHTML =
        '<button value="Insertar" onclick="Inserta()"/>';
    } else {
      td.innerHTML = "<input type='text'>";
    }
    tr.appendChild(td);
  }
  tfoot[0].appendChild(tr);

});

function Inserta() {
    var tableRef = document.getElementsByTagName("tbody")[0];
    var tpie = document.getElementsByTagName("tfoot");
    var lineaAmeter = [];
    var i = 0;
    for (i = 0; i < tpie.childNodes.childNodes; i++) {
      lineaAmeter[i] = tpie.childNodes.childNodes[i].value;
    }
    var nuevotr = document.createElement("tr");
   
    for (i = 0; i < tpie.length; i++) {
      var nuevotd = document.createElement("td");
      nuevotd.innerHTML = lineaAmeter[i];
      nuevotr.appendChild(nuevotd);
    }
    tableRef.appendChild(nuevotr);
  }