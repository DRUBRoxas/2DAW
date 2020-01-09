<?php

/**
 * EL ÚNICO USUARIO REGISTRADO AHORA MISMO ES EL SIGUIENTE:
 * Nombre: manu
 * Contraseña: 1234
 */
require_once '../Cargadores/cargarclases.php';
require_once '../Cargadores/cargarhelper.php';
Sesion::iniciar();
if (!Sesion::leer("sagricultor")) {
    $sagricultor = new Sagricultor("SAgricultores S.L.", "14-666-P");
    Sesion::escribir("sagricultor", $sagricultor);
}


class Principal
{
    public static function main()
    {
        require_once './Vistas/Principal/layout.php';
    }
}
Principal::main();
