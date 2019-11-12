<?php


//Hecho por Manuel
function creaClases(string $nombreBD)
{
    $dsn = "mysql:dbname=$nombreBD;host=127.0.0.1";
    $usuario = "root";
    $passwd = "";

    try {
        $conexion = new PDO($dsn, $usuario, $passwd);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = $conexion->query("select TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
        WHERE table_schema = '$nombreBD'");
        //Por defecto datos se devuelven indexados y asociativos
        $tablas = $consulta->fetchAll(PDO::FETCH_ASSOC);
        var_dump($tablas);
        foreach ($tablas as $tabla) {
            $clase = implode($tabla);
            $consulta = $conexion->query("SHOW COLUMNS FROM $nombreBD.$clase");
            $columnas = $consulta->fetchAll(PDO::FETCH_ASSOC);
            if (!file_exists("./Clases/$clase.php")) {
                $fh = fopen("./Clases/$clase.php", 'w') or die("Se produjo un error al crear el archivo");
                fwrite($fh, "<?php\nclass $clase\n{\n") or die("No se pudo escribir en el archivo");
                foreach ($columnas as $propiedad) {
                    $nombre = $propiedad['Field'];
                    $texto = "\tpublic $" . $nombre . ";\n";
                    fwrite($fh, $texto) or die("No se pudo escribir en el archivo");
                }
                fwrite($fh, "}");
                fclose($fh);
            }

            var_dump($columnas);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


//Hecho por Antonio

creaClases("northwind");