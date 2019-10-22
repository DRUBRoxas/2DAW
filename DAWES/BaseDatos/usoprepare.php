<?php
require_once './Clases/categorie.php';
$dsn = "mysql:dbname=northwind;host=127.0.0.1";
$usuario = "root";
$passwd = "";

try {
    $conexion = new PDO($dsn, $usuario, $passwd);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión realizada...";

    $consulta = $conexion->prepare("select CategoryName as NombreCategoria,Description as Descripcion 
    from categories where CategoryID>? and CategoryName > ?");

    $consulta->execute([3, "c"]);
    $categorias = $consulta->fetchAll(PDO::FETCH_CLASS, "categorie");
    var_dump($categorias);
    foreach ($categorias as $categoria) {
        echo "Categoria: " . $categoria->NombreCategoria . "</br>";
    }
} catch (PDOException $e) {
    //código error...
}