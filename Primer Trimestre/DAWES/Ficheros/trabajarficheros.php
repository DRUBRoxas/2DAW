<?php

//abrir un fichero para escritura
$fichero = fopen('./ficheros/texto.txt', "wt");
//Escribir datos en un fichero
fwrite($fichero, "Linea1 \n");
fwrite($fichero, "Linea2 \n");
fclose($fichero);
//Abrir un fichero para escritura
$fichero = fopen('./ficheros/texto.bin', "wb");
//Escribir datos en el fichero
fwrite($fichero, 'Linea1\n');
fwrite($fichero, 'Linea2\n');
fclose($fichero);


//---------------------------------------
//Abrir para Leer

$fichero = fopen('./ficheros/texto.txt', "rt");
while ($linea = fgets($fichero)) {
    echo $linea . "<br>";
}
fclose($fichero);
$datos = file_get_contents("./ficheros/texto.txt");
echo $datos;

//Leer en Binario
$fichero = fopen("./ficheros/texto.bin", "rb");
fclose($fichero);