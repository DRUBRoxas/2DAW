<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once 'index.php';
    }
    if ($_GET['menu'] == "mantenimiento") {
        require_once './Vistas/Mantenimiento/mantenimiento.php';
    }
    if ($_GET['menu'] == "listados") {
        require_once './Vistas/Mantenimiento/Listado.php';
    }
    if ($_GET['menu'] == "nuevoagricultor") {
        require_once './Vistas/Mantenimiento/nuevoagricultor.php';
    }
    if ($_GET['menu'] == "modificaagricultor") {
        require_once './Vistas/Mantenimiento/modificaagricultor.php';
    }

    if ($_GET['menu'] == "login") {
        require_once './Vistas/Login/autentifica.php';
    }

    if ($_GET['menu'] == "cerrarsesion") {
        require_once './Vistas/Login/cerrarsesion.php';
    }
}