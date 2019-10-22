<?php
require_once './Clases/Categoria.php';
//Crear conexion a BD
$dsn = "mysql:dbname=northwind;host=127.0.0.1";
$usuario = "root";
$passwd = "";
try {
    $conexion = new PDO($dsn, $usuario, $passwd);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión realizada...";

    $consulta = $conexion->query("select CategoryName,Description from categories");
    //Por defecto datos se devuelven indexados y asociativos
    $categorias = $consulta->fetchAll();
    var_dump($categorias);

    //Datos asociativos
    $consulta = $conexion->query("select CategoryName,Description from categories");
    $categorias = $consulta->fetchAll(PDO::FETCH_ASSOC);
    var_dump($categorias);

    //Datos indexados
    $consulta = $conexion->query("select CategoryName,Description from categories");
    $categorias = $consulta->fetchAll(PDO::FETCH_NUM);
    var_dump($categorias);

    //Leer y convertir en objetos categoria
    $consulta = $conexion->query("select CategoryName as NombreCategoria,Description
         as Descripcion from categories");
    $categorias = $consulta->fetchAll(PDO::FETCH_CLASS, "Categoria");
    var_dump($categorias);
} catch (PDOException $e) {
    echo $e->getMessage();
}
