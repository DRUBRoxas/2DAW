<?php
require_once '../Cargadores/cargarclases.php';
class Principal
{
    public static function main()
    {
        $gestiona=new GestionAnimales();
        //Añadir un nuevo animal
        $gestiona->crearAnimal("111a","Luna","Yorkshire","12-12-2012");
        //Comprobar si se añade
        var_dump($gestiona->todosAnimales());
        //Modifica animal
        $gestiona->modificaAnimal("111a",["Estrella","Pachón","12-12-2018","vacunas"=>[]]);
        //Comprobar modificación
        var_dump($gestiona->todosAnimales());
        //ponemos una vacuna
        $gestiona->nuevaVacuna("111a","Moquillo","12-11-2019","Dosis bajas perro pequeño");
        //Comprobamos vacuna
        var_dump($gestiona->todosAnimales());
        //Modifica vacuna
        $gestiona->modificaVacuna("111a","Moquillo",["12-12-2019","Dosis completa"]);
        //Comprobar modifica vacuna
        print_r($gestiona->todosAnimales());
    }
}
Principal::main();