//Lógica del Parking 


//Esto es un objeto
function Parking(mgratis, pminuto, maxdia) {
    aparcados = [];
    this.plazas;
    this.minutosGratis = mgratis;
    this.precioMinuto = pminuto;
    this.maximoDia = maxdia;
}

Parking.prototype.entra = function(coche) {

    if (!this.comprobarExistente(coche)) {
        this.aparcados.push(coche);
    } else {
        alert("Este coche ya está dentro del parking, bribón");
        window.location.href = "policia.html";
    }

}

Parking.prototype.sale = function(coche) {

    vehiculo = this.aparcados.indexOf(coche);
    this.aparcados.splice(vehiculo, 1);
}


function Coche(mat) {
    this.mat = mat;
    this.entrada = (new Date().getTime());
}

Parking.prototype.almacena = function() {
    var cadena = JSON.stringify(this.aparcados)
    localStorage.setItem("aparcados", cadena);
}

Parking.prototype.comprobarExistente = function(vehiculo) {
    var dentro = false;
    for (i = 0; i < this.aparcados.length; i++) {
        coche = this.aparcados[i];
        if (coche.mat === vehiculo.mat) {
            dentro = true;
        }
    }
    return dentro;
}

Parking.prototype.recuperar = function() {
    if (localStorage.getItem("aparcados")) {
        this.aparcados = JSON.parse(localStorage.getItem("aparcados"));
    } else {
        this.aparcados = [];
    }
}

Parking.prototype.vaciar = function() {
    this.aparcados = [];
    var cadena = JSON.stringify(this.aparcados)
    localStorage.setItem("aparcados", cadena);

}
Parking.prototype.devolverCoche = function(mat) {
    var i = 0;
    for (i = 0; i < this.aparcados.length; i++) {
        coche = this.aparcados[i];
        if (coche.mat === mat) {
            return coche;
        }
    }
    return null;
}
Parking.prototype.robado = function(coche) {
        coche_robado = false;
        if (localStorage.getItem("robados")) {
            var robados = JSON.parse(localStorage.getItem("robados"));
            debugger;
            for (i = 0; i < robados.length; i++) {
                if (robados[i].mat === coche.mat) {
                    coche_robado = true;
                } else {}
            }
        }
        return coche_robado;
    }
    // *FALTA* controlar que hacer cuando se pase del día, solo controla que se pase de los 15 euros
Parking.prototype.CalcularPrecioTotal = function(coche) {
    var precio;
    var tiempo = (new Date().getTime()) - coche.entrada;
    var minutos = parseInt(tiempo / (1000 * 60));
    if (minutos > this.minutosGratis) {
        var dias = parseInt(minutos / (60 * 24));
        var sobrantes = minutos % (60 * 24);
        precio = sobrantes * this.precioMinuto;
        if (precio > this.maximoDia) {
            precio = this.maximoDia;
        }
        precio = precio + dias * this.maximoDia;
        return precio.toFixed(2);
    }
}