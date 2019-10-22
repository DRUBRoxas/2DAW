<?php
require_once './Clases/categorie.php';
$dsn = "mysql:dbname=northwind;host=127.0.0.1";
$usuario = "root";
$passwd = "";
try {
    $conexion = new PDO($dsn, $usuario, $passwd);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión realizada...";

    //Leer y convertir en objetos categoria
    $consulta = $conexion->query("select CategoryName as NombreCategoria,Description
        as Descripcion from categories");
    $categorias = $consulta->setFetchMode(PDO::FETCH_CLASS, "categorie");
    while ($categoria = $consulta->fetch()) {
        var_dump($categoria);
        echo "NombreCategoria= " . $categoria->NombreCategoria . "</br>";
        echo "Descripcion= " . $categoria->Descripcion . "</br>";
        echo "....................................................", "<br>";
    }
    var_dump($categorias);
} catch (PDOException $e) {
    //código error...
}