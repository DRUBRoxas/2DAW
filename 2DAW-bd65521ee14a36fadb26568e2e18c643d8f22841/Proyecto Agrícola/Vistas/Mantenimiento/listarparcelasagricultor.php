<?php
Sesion::iniciar();
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();
?>

<h1>MANTENIMIENTO DE AGRICULTORES</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Parcela</th>
            <th scope="col">Nombre</th>
            <th scope="col">Numero Parcela</th>
            <th scope="col">Numero Polígono</th>
            <th scope="col">Numero Olivos</th>
        </tr>
    </thead>