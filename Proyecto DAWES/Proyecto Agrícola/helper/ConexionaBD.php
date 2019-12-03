<?php
require_once './Clases/producto.php';
$dsn = "mysql:dbname=northwind;host=127.0.0.1";
$usuario = "root";
$passwd = "";

function ConectaraBD()
{
    try {
        $conexion = new PDO($dsn, $usuario, $passwd);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        //código error...
    }
}

function leer($nombretabla)
{
    try {
        $conexion = new PDO($dsn, $usuario, $passwd);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = $conexion->prepare("select * from " + $nombretabla);
        $consulta->execute();
        $resultado = $consulta->fetchAll();
    } catch (PDOException $e) {
        //error
    }
}