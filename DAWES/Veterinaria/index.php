<?php
require_once '../Cargadores/cargarclases.php';
require_once '../Cargadores/cargarhelper.php';
Sesion::iniciar();
$sanimal=new Veterinaria("SANIMAL S.L.","23-111-B");
Sesion::escribir("veterinaria",$sanimal);
class Principal
{
    public static function main()
    {
        require_once './Vistas/Principal/layout.php';
    }
}
Principal::main();