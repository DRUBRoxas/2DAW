<?php
require_once './Clases/producto.php';
$dsn = "mysql:dbname=northwind;host=127.0.0.1";
$usuario = "root";
$passwd = "";

try {
    $conexion = new PDO($dsn, $usuario, $passwd);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //preparar una consulta
    $consulta = $conexion->prepare("select ProductId,ProductName,CategoryID,UnitPrice from
    Products where CategoryID=:idcat and UnitPrice > :precio");
    //Vinculamos parámetros
    //  $consulta->bindParam(":idcat", 4, PDO::PARAM_INT);
    //  $consulta->bindParam(":precio", 20);
    //Ejecutar consulta
    $consulta->execute();
    $productos = $consulta->fetchAll(PDO::FETCH_CLASS, "Producto");
    var_dump($productos);

    //otra consulta
    $id = 5;
    $pre = 30;
    $productos = $consulta->fetchAll(PDO::FETCH_CLASS, "Producto");
    $consulta->bindParam(":idcat", $id, PDO::PARAM_INT);
    $consulta->bindParam(":precio", $pre);
    $consulta->execute();
    var_dump($consulta);
} catch (PDOException $e) {
    //código error...
}