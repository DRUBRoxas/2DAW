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
var ArrayCoches = {};

Coche.prototype.cambiarPropietario = function(propietario) {
  this.propietario = propietario;
};

Coche.prototype.pintar = function(color) {
  this.color = color;
};

Coche.prototype.imprimirCoche = function(coche) {};



function Matricular() {
  var marca = document.getElementById("marca").value;
  var modelo = document.getElementById("modelo").value;
  var añomat = document.getElementById("añomat").value;
  var color = document.getElementById("color").value;

  if (marca == "" || modelo == "" || añomat == "" || color == "") 
  {
    alert("Introduce los datos correctamente");
  } 
  else 
  {
    var coche1 = new Coche(marca, modelo, añomat, color);
    ArrayCoches.push(coche1);
    document.getElementById("formul").reset();
  }
}

function DeleteThis() {}
function Imprimir() {
  ArrayCoches.array.forEach(imprimirCoche);
}
function imprimirCoche(Coche) {
  var c1 = Coche;
  document.getElementById("coche").innerHTML +=
    "<><td>" +
    c1.mat +
    "</td><td>" +
    c1.marca +
    "</td><td>" +
    c1.modelo +
    "</td><td>" +
    c1.añomat +
    "</td><td>" +
    c1.color +
    "</td><td>" +
    <input type="button" value="Borrar" onclick="DeleteThis()" /> +
    "</td></tr>";
}

/*
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
*/
