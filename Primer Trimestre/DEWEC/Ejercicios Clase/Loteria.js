var numeros = [];
var premio = [];

function RellenaArray(numeros) {
  for (let i = 0; i < 1000; i++) {
    numeros[i] = i;
  }
}

function shuffleArray(numeros) {
  for (var i = numeros.length - 1; i > 0; i--) {
    var j = Math.floor(Math.random() * (i + 1));
    var temp = numeros[i];
    numeros[i] = numeros[j];
    numeros[j] = temp;
  }
}

function MostrarNumeros(numeros) {
  RellenaArray(numeros);
  shuffleArray(numeros);
  for (var i = 0; i < 5; i++) {
    var a = aleatorio(0, 999);
    premio[i] = numeros[a];
  }
}

function aleatorio(inferior, superior) {
  var numPosibilidades = superior - inferior;
  var aleat = Math.random() * numPosibilidades;
  aleat = Math.round(aleat);
  return parseInt(inferior) + aleat;
}


//Manera SuperEficiente
function loteria() 
{
    var arraynumeros=[]
    for (let i = 0; i < 1000; i++) {
        arraynumeros[i] = i;
      }
    numeros.sort(function(a,b){return Math.random()-0.5})
    document.getElementById("premiados").value+=numeros.join("/n");
}