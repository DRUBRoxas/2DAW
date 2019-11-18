//Lógica del Parking 


//Esto es un objeto
function Parking() {
    aparcados = [];
    this.plazas

}

Parking.prototype.entra = function(coche) {
    this.aparcados.push(coche);
}

function Coche(mat) {
    this.mat = mat;
    this.entrada = (new Date().getTime());
}

Parking.prototype.almacena = function() {
    var cadena = JSON.stringify(this.aparcados)
    localStorage.setItem("aparcados", cadena);
}

Parking.prototype.recuperar = function() {
    if (localStorage.getItem("aparcados")) {
        this.aparcados = JSON.parse(localStorage.getItem("aparcados"));
    } else {
        this.aparcados = [];
    }
}