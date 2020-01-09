<?php
//Recogida de datos
Sesion::iniciar();
if (!Login::UsuarioEstaLogueado()) {
    header("location:?menu=login&returnurl=mantenimiento");
}
$sagricultor = Sesion::leer("sagricultor");
?>

<h1>¿Que desea hacer?</h1>

<a class="btn btn-primary" href="?menu=listaragricultores">Agricultores</a>
<a class="btn btn-primary" href="?menu=alquilarmaquina">Maquinas</a>

<a class="btn btn-primary" href="../../index.php">Salir de Mantenimiento</a>