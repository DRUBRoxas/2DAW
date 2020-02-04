"use strict";
exports.__esModule = true;
var Animal = /** @class */ (function () {
    function Animal(nombre) {
        this.nombre = nombre;
    }
    Animal.prototype.muevete = function (velocidad) {
        if (velocidad === void 0) { velocidad = 0; }
        console.log(this.nombre + " se est\u00E1 moviendo " + velocidad);
    };
    return Animal;
}());
exports.Animal = Animal;
