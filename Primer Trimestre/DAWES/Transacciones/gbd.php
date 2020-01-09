<?php
require_once("../Cargadores/cargarhelper.php");
require_once("../Cargadores/cargarclases.php");
try {
    $bd = new GDB("127.0.0.1", "northwind", "root", "");
} catch (PDOException $e) {
    //código error...
}
