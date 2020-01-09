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
var ArrayCoches = [];

Coche.prototype.cambiarPropietario = function(propietario) {
  this.propietario = propietario;
};

Coche.prototype.pintar = function(color) {
  this.color = color;
};

function Matricular() 
{
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
    var c1 = new Coche(marca, modelo, añomat, color);
    ArrayCoches.push(c1);
    document.getElementById("formul").reset();
  }
}

function DeleteThis(posicion)
{
  ArrayCoches.splice(posicion,1);
  Imprimir();
}


function Imprimir() 
{
  document.getElementById("coche").innerHTML = "";
  var i=0;
  ArrayCoches.forEach(function imprimir(Coche){
  i=i++;
  document.getElementById("coche").innerHTML +=
    "<tr><td>" +
    Coche.mat +
    "</td><td>" +
    Coche.marca +
    "</td><td>" +
    Coche.modelo +
    "</td><td>" +
    Coche.añomat +
    "</td><td>" +
    Coche.color +
    "</td><td>"+
    "<button type='button' onclick='DeleteThis("+i+")'>X</button>"+
    "</td></tr>";
    
  });
  
}