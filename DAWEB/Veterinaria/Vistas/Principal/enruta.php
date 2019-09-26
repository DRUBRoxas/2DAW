<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "mantenimiento") {
        require_once '../Mantenimiento/mantenimiento.php';
    }
    if ($_GET['menu'] == "listados") {
        require_once '../Mantenimiento/Listado.php';
    }
}
