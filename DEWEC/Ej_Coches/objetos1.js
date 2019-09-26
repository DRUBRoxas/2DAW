function creador() {
  var mat = 0;
  return function Coche(marca, modelo, añomat, color) {
    this.mat = mat++;
    this.marca = marca || "";
    this.modelo = modelo || "";
    this.añomat = añomat || "";
    this.color = color || "";
  };
}

Coche = creador();

Coche.prototype.cambiarPropietario = function(propietario) {
  this.propietario = propietario;
};

Coche.prototype.pintar = function(color) {
  this.color = color;
};

Coche.prototype.Imprimir = function(coche) {};

function Matricular() {
  var marca = document.getElementById("marca").value;
  var modelo = document.getElementById("modelo").value;
  var añomat = document.getElementById("añomat").value;
  var color = document.getElementById("color").value;

  if (marca == "" || modelo == "" || añomat == "" || color == "") {
    alert("Introduce los datos correctamente");
  } else {
    var c1 = new Coche(marca, modelo, añomat, color);

    document.getElementById("coche").innerHTML +=
      "<tr><td>" +
      c1.mat +
      "</td><td>" +
      c1.marca +
      "</td><td>" +
      c1.modelo +
      "</td><td>" +
      c1.añomat +
      "</td><td>" +
      c1.color +
      "</td></tr>";

    document.getElementById("formul").reset();
  }
}

//Objeto Persona
function creadorP() {
  var dni = 0;
  return function Persona(nombre, apellidos, edad, sexo) {
    this.dni = dni++;
    this.nombre = nombre || "";
    this.apellidos = apellidos || "";
    this.edad = edad || "";
    this.sexo = sexo || "M";
  };
}

Persona = creadorP();

function Guardar() {
  var ArrayPersonas = [];
  var nombre = document.getElementById("nombre").value;
  var apellidos = document.getElementById("apellido").value;
  var edad = document.getElementById("edad").value;
  var sexo = document.getElementById("sexo").value;

  if (nombre == "" || apellidos == "" || edad == "" || sexo == "") {
    alert("Introduce los datos correctamente");
  } else {
    var c1 = new Persona(nombre, apellidos, edad, sexo);

    document.getElementById("persona").innerHTML +=
      "<tr><td>" + c1.dni + "</td><td>" + ç;
    c1.nombre +
      "</td><td>" +
      c1.apellidos +
      "</td><td>" +
      c1.edad +
      "</td><td>" +
      c1.sexo +
      "</td><td>"+
      <input type='button' value='Borrar' onclick='DeleteThis()'/>+
      "</td></tr>";

    document.getElementById("formulP").reset();
  } 
}

function DeleteThis() {}

Persona.prototype.CumplirAños = function() {
  this.edad++;
};

Persona.prototype.Imprimir = function() {
  console.log(this);
};
