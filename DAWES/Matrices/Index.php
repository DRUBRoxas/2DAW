<?php
require_once '../Cargadores/cargarclases.php';
class Principal
{
    public static function main()
    {
        //Recorrer matrices
        //Unidimensionales 
        foreach (EjemplosMatrices::$nombres as $key => $value) {
            echo $key."...".$value."</br>";
        }
        //Asociativa
        foreach (EjemplosMatrices::$nombreedad as $nombre => $edad) {
            echo "El tipo ".$nombre." tiene ".$edad." años</br>";
        }
        //Añadir elemento al final de un array
        EjemplosMatrices::$edades[100]=5;
        EjemplosMatrices::$edades[]=89;
        var_dump(EjemplosMatrices::$edades);
        //Recorrer matriz de objetos asociativa
        foreach (EjemplosMatrices::MatrizObjetoAsociativa() as $nombre => $animal) {
            echo "El animal con nombre ".$nombre." pertenece al genero ".
            $animal->getGenero()."</br>";
        }

        //acceso a elemento de matriz dos dimensiones
        echo EjemplosMatrices::$comunidades[0][1];

        //Recorrer matriz de dos dimensiones
        foreach (EjemplosMatrices::$comunidadesasoc as $comunidad => $matrizprovincias)
        {
            echo "</br>La comunidad de ".$comunidad." tiene las siguientes provincias:</br>";
            foreach ($matrizprovincias as $provincia) {
                echo "<blockquote>$provincia</blockquote></br>";
            }
        }


    }
}
Principal::main();