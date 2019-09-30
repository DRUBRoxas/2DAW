<?php
require_once '../Cargadores/cargarclases.php';
class Principal
{
    public static function main()
    {
        $gestiona = new gestionAnimales();
        //nuevo animal
        $gestiona->crearAnimal("illa", "Luna", "yorkshire", "12-12-2012");
        //comprobar si se añade
        var_dump($gestiona->todosAnimales());
        //Modificar
        $gestiona->modificarAnimal("illa", ["Estrella", "Pachón", "12-12-2018", "vacunas" => []]);
        //comprobar
        var_dump($gestiona->todosAnimales());
        //NuevaVacuna
        $gestiona->nuevaVacuna("illa", "Moquillo", "12-11-2019", "Dosis baja perro pequeño");
        //comprobar Vacunas
        var_dump($gestiona->todosAnimales());
        //modifica vacuna
        $gestiona->modificaVacuna("illa", "Moquillo", ["12-12-2019", "dosis completa"]);
        //comprobar Cambios
        print_r($gestiona->todosAnimales());
    }
}
Principal::main();