<?php
require_once '../Cargadores/cargarclases.php';
require_once '../Cargadores/cargarhelper.php';

class Principal
{
    public static function main()
    {
        require_once './Vistas/Principal/layout.php';
    }
}
Principal::main();