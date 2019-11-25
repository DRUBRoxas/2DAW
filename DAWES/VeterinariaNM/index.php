<?php

use Veterinaria\helper\Sesion;
use Veterinaria\Clases\Veterinaria;

require_once './vendor/autoload.php';
Sesion::iniciar();
if (!Sesion::leer("veterinaria")) {
    $sanimal = new Veterinaria("SANIMAL S.L.", "23-111-B");
    Sesion::escribir("veterinaria", $sanimal);
}
class Principal
{
    public static function main()
    {
        require_once './Vistas/Principal/layout.php';
    }
}
Principal::main();
