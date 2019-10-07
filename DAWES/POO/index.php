<?php
//require_once './Clases/persona.php';
//require_once './Clases/alumno.php';
require_once '../Cargadores/cargarclases.php';
class Principal
{
    public static function main()
    {
        $noelia=new Persona("123456789Z");
        $juan=new Persona("123456789A","Juan",24);
        $noelia->setNombre("Noelia");
        echo "<h1>".$noelia->getNombre()."</h1>";
        //Acceso a una propiedad estática
        echo "</br>Todas las personas tienen ".Persona::$numeroojos;
        echo "</br> Número de orejas = " . $noelia->getNumeroorejas();

        //Alumno
        $silverio=new Alumno("123456789O","Silverio",45,10);

        //Matriz de alumnos indexada
        $alumnos=[new Alumno("1234A","Pepe",30,8), new Alumno("3456S","Alfonso",20,5)];
        echo "</br> <h1>Listado de alumnos</h1>";
        foreach ($alumnos as $alumno) {
            echo "Dni= ".$alumno->getDni()." Nombre= ".$alumno->getNombre()."</br>";
        }

        //Matriz de alumnos asociativa
        $al1=new Alumno("1111A","Luis",34,2);
        $al2=new Alumno("2222A","Juan",23,6);
        $alumnosasoc=[$al1->getDni()=>$al1,"2222A"=>$al2];
        foreach ($alumnosasoc as $dni => $alumno) {
            echo "Dni= ".$dni." Nombre= ".$alumno->getNombre()."</br>"; 
        }

    }
}
Principal::main();