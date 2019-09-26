<?php
    require_once'../../PHP20192020/Cargadores/cargarclases.php';

    class Principal
    {
        public static function main()
        {
            //Recorrer Matrices
            //Unidimensional
            foreach (EjemplosMatrices::$nombres as $key => $value) 
            {
                echo $key."...".$value."<br>";
            }

            //Asociativa
            foreach (EjemplosMatrices::$NombreEdad as $nombre => $edad) 
            {
                echo "el tipo".$nombre."tiene ".$edad."años <br>";
            }

            //Elementos al final del array
            EjemplosMatrices::$edades[100]=5;
            EjemplosMatrices::$edades[]=89;

            //Muestra la variable con toda su informacion (Se utiliza paraa depurar)
            var_dump(EjemplosMatrices::$edades);

            //Recorrer Matriz de objetos asociativa
            foreach (EjemplosMatrices::MatrizObjetosAsociativa() as $nombre => $animal) 
            {
                echo "El animal con nombre ".$nombre." Pertenece al género ".$animal->getGenero()."<br>";
            }

            //Matriz de 2 dimensiones
            foreach (EjemplosMatrices::$comunidadesasoc as $comunidad => $matrizprovincias)
            {
                echo "<br>la comunidad de ".$comunidad." Tiene las siguientes provincias:<br>";
                foreach ($matrizprovincias as $provincia)
                {
                    echo "$provincia<br>";
                }
            }
        }
    }
    principal::main();
?>