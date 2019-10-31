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
    if ($_GET['menu'] == "borraagricultor") {
        require_once './Vistas/Mantenimiento/borraagricultor.php';
    }
    if ($_GET['menu'] == "login") {
        require_once './Vistas/Login/autentifica.php';
    }
    if ($_GET['menu'] == "cerrarsesion") {
        require_once './Vistas/Login/cerrarsesion.php';
    }

    if ($_GET['menu'] == "listarparcelasagricultor") {
        require_once './Vistas/Mantenimiento/listarparcelasagricultor.php';
    }

    if ($_GET['menu'] == "nuevamaquina") {
        require_once './Vistas/Mantenimiento/nuevamaquina.php';
    }
    if ($_GET['menu'] == "alquilarmaquina") {
        require_once './Vistas/Mantenimiento/alquilarmaquinas.php';
    }
    if ($_GET['menu'] == "alquilar") {
        require_once './Vistas/Mantenimiento/alquilar.php';
    }
    if ($_GET['menu'] == "listadoalquiladas") {
        require_once './Vistas/Mantenimiento/listadoalquiladas.php';
    }
}