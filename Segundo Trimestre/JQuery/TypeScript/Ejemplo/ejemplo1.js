"use strict";
var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
exports.__esModule = true;
var Empleado = /** @class */ (function () {
    function Empleado(name) {
        this.employeeName = name;
    }
    Empleado.prototype.saluda = function () {
        console.log("Good Morning " + this.employeeName);
    };
    return Empleado;
}());
var empleado1 = new Empleado("Manuel");
empleado1.saluda();
var Manager = /** @class */ (function (_super) {
    __extends(Manager, _super);
    function Manager(nombreJefe, cargo) {
        var _this = _super.call(this, nombreJefe) || this;
        _this.cargo = cargo;
        return _this;
    }
    Manager.prototype.delega = function () {
        console.log("haz esto");
    };
    return Manager;
}(Empleado));
var m1 = new Manager("Antonio Illana", "Jefe dpto");
m1.saluda();
