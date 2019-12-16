/*
Librería para el funcionamiento básico de un dispensador de productos
Autor: Silverio Vílchez López
Coautor:Manuel Sánchez Salazar
*/

function Expendedor() {
    this.monedero = {}; //Monedas en la maquina
    this.productos = {};
    this.monederoAux = {}; //monedas introducidas por el cliente
    this.totalIntroducido = 0;
}

Expendedor.prototype.cargarM = function(monedas) {
    for (let i = 0; i < monedas.length; i++) {
        this.monedero[monedas[i].id] = monedas[i];
    }
}

Expendedor.prototype.cargarP = function(productos) {
    for (let i = 0; i < productos.length; i++) {
        this.productos[productos[i].id] = productos[i];
    }
}

Expendedor.prototype.vuelta = function(precio) {
    //Modificar el funcionamiento de esta función para que genere la vuelta teniendo encuenta las monedas
    //que se encuentran en los monederos, primero las mas grandes mientras haya y así sucesivamente.
    //en caso de no haber suficiente dinero se debe devolver esta circustancia para no proceder a la venta,
    //si se puediera generar una vuelta se devolvera esta.
    /**  var Preciot = this.totalIntroducido;
    var cambio = Preciot - precio;
    while (cambio != 0) {
        if ((cambio % 200) > 1) {
            cambio % 200
        }
    }
*/
}

Expendedor.prototype.insertarMoneda = function(cod) {
    var valor = this.monedero[cod].valor;
    if (this.monederoAux[cod])
        this.monederoAux[cod]++;
    else {
        this.monederoAux[cod] = 1
    }
    this.totalIntroducido += valor;
}

Expendedor.prototype.recuperar = function() {
    var vuelta = {};
    var i;
    for (i in this.monederoAux) {
        vuelta[i] = JSON.parse(JSON.stringify(this.monedero[i]));
        vuelta[i].stock = this.monederoAux[i];
    }
    this.monederoAux = {};
    this.totalIntroducido = 0;
    console.log(vuelta);

    return vuelta;
}

Expendedor.prototype.vender = function(cod) {


    //Comprobar si se ha introducido suficiente dinero en caso afirmativo
    //Comprobar si se puede generar la vuelta
    //Actualizar stock de productos
    //Actualizar stock en monedas
    //Vacia monederoAUX
    //generar mensaje respuesta si se puede hacer la venta.
    var precio_producto = this.productos[cod].precio
    var total = this.totalIntroducido;
    var aDevolver = total - precio_producto;
    var vueltaT = this.vuelta(aDevolver);
    if (this.productos[cod].stock == 0) {
        return { vendido: false, mensaje: "No hay Stock", vuelta: {}, producto: "" }
    } else if (aDevolver < 0) {
        return { vendido: false, mensaje: "Dinero Insuficiente", vuelta: {}, producto: "" }
    } else if (vueltaT.funciona == false) {
        return { vendido: false, mensaje: "Introduce el Dinero exacto", vuelta: {}, producto: "" }
    } else {
        /*     this.productos[cod].stock = this.productos[cod].stock - 1;
             //cargamos monedas de uno al otro
             this.cargarM(this.monederoAux);
             this.monederoAux = {};
             return { vendido: true, mensaje: "Vendido", vuelta: { vueltaT }, producto: this.productos[cod] };
             */
    }
}




//*Ejemplo de uso de la librería
/*var expen=new Expendedor();
expen.cargarM(monedas);
expen.cargarP(productos);
var venta=expen.vender(3);
expen.insertarMoneda(2);
expen.insertarMoneda(3);
console.log(expen.recuperar());
*/