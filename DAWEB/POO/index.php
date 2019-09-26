<?php
require_once './Clases/Persona.php';
require_once './Clases/Alumno.php';

class Principal
{
    public static function main()
    {
        $Noelia=new Persona("12345678Z");
        $Juan=new Persona ("12345678A","Juan",24);
        $Noelia->setNombre("Noelia");
        echo "<h1>".$Noelia->getNombre()."</h1>";
        //Acceso a una propiedad estática
        echo "Todas las personas tienen ". Persona::$numeroojos." ojos";
        echo "</br>Todas las personas tienen ". $Noelia->getNumeroorejas()." orejas";

        //Alumno
        $Silverio= new Alumno("12345678P","Silverio",45,10);
        echo $Silverio->getNota();
        //Matriz de alumnos
        $Alumnos=[New Alumno("1234A","Pepe",19,8), new Alumno("12346","Alfonso",20,5)];
        echo "<h1>Listado de Alumnos</h1>";
        foreach($Alumnos as $alumno)
        {
            echo "DNI= ".$alumno->getDni()." Nombre= ".$alumno->getNombre()."</br>";
        }

        //Matriz de alumnos asociativa
        $al1=new Alumno("1354A","Luis",34,5);
        $al2=new Alumno("1378A","Pedro",23,6);
        $alumnosasoc=[$al1->getDni()=>$al1,"1378A"=>$al2];
        foreach($alumnosasoc as $dni => $alumno)
        {
            echo "DNI= ".$alumno->getDni()." Nombre= ".$alumno->getNombre()."</br>";
        }

    }
}

Principal::main();
?>