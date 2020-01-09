//Objeto Tienda

var articulos = [{ cod: 1, descripcion: "leche puleva", precio: 2.35, stock: 5 },
    { cod: 3, descripcion: "Pan bimbo 650g", precio: 1, stock: 5 },
    { cod: 7, descripcion: "Arroz 1KG", precio: 0.7, stock: 3 },
    { cod: "a12", descripcion: "Agua Lanjaron 1L", precio: 0.48, stock: 5 }
];

function Tienda() {
    this.productos = {};
    this.total = 0;
    this.carrito = {};
}

Tienda.prototype.cargarProductos = function(productos) {
    var i;
    for (i = 0; i < productos.length; i++) {
        this.productos[productos[i].cod] = productos[i];
    }
}

Tienda.prototype.anadir = function(cod) {
    if (this.carrito[cod]) {
        this.carrito[cod]++;

    } else {
        this.carrito[cod] = 1;
    }
    if (this.carrito[cod] > this.productos[cod].stock) {
        this.carrito[cod]--;
    } else {
        this.total += this.productos[cod].precio;
    }
}

Tienda.prototype.quitar = function(cod) {
    if (this.carrito[cod]) {
        this.carrito[cod]--;
        this.total -= this.productos[cod].precio;
    }
    if (this.carrito[cod] == 0) {
        delete this.carrito[cod];

    }
}

Tienda.prototype.vender = function() {
    var respuesta = {};
    respuesta["total"] = this.total;
    respuesta.productos = [];
    var i;
    for (i in this.carrito) {
        respuesta.productos.push({
            cod: i,
            descripcion: this.productos[i].descripcion,
            precio: this.productos[i].precio,
            cantidad: this.carrito[i],
            total: this.carrito[i] * this.productos[i].precio
        });
        this.productos[i].stock -= this.carrito[i];
    }

    this.carrito = {};
    this.total = 0;
    return respuesta;

}

/*
var t = new Tienda();
t.cargarProductos(articulos)
t.anadir(7);
t.anadir(7);
console.log(t);
console.log(t.vender());
*/