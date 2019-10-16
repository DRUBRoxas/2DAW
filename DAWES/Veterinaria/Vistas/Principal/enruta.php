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
    if ($_GET['menu'] == "nuevoanimal") {
        require_once './Vistas/Mantenimiento/nuevoanimal.php';
    }
    if ($_GET['menu'] == "borraanimal") {
        require_once './Vistas/Mantenimiento/borraanimal.php';
    }
    if ($_GET['menu'] == "modificaanimal") {
        require_once './Vistas/Mantenimiento/modificaanimal.php';
    }
    if ($_GET['menu'] == "login") {
        require_once './Vistas/Login/autentifica.php';
    }
    if ($_GET['menu'] == "cerrarsesion") {
        require_once './Vistas/Login/cerrarsesion.php';
    }
}
