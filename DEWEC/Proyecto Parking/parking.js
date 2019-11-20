//Lógica del Parking 


//Esto es un objeto
function Parking() {
    aparcados = [];
    this.plazas
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
    /** 
    Parking.prototype.robado = function(coche) {
            coche_robado = false;
            if (localStorage.getItem("robados")) {
                var robados = JSON.parse(localStorage.getItem("robados"));
                for (i = 0; i < robados.length; i++) {
                    if (robados[i].mat === coche.mat) {
                        coche_robado = true;
                    } else {
                        break;
                    }
                }
            }
            return coche_robado;
        }
    **/
    // *FALTA* controlar que hacer cuando se pase del día, solo controla que se pase de los 15 euros
Parking.prototype.CalcularPrecioTotal = function(coche) {
    var precio;
    tiempo = (new Date().getTime()) - coche.entrada;

    if (tiempo <= 1800000) {
        precio = 0;
    } else if (tiempo >= 18000000) {
        precio = 15;
    } else {
        tiempo = tiempo / 1000;
        tiempo = tiempo / 60;
        precio = tiempo * 5;
        precio = precio / 100;
    }

    return precio.toFixed(2);

}