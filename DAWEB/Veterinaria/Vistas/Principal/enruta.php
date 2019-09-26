<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "mantenimiento") {
        require_once './Vistas/Mantenimiento/mantenimiento.php';
    }
    if ($_GET['menu'] == "listados") {
        require_once './Vistas/Mantenimiento/Listado.php';
    }
}
