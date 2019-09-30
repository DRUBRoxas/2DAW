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

function Matricular() {
  alert("Holi");
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