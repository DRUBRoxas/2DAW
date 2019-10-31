<?php
Sesion::iniciar();
$sagricultor = Sesion::leer('sagricultor');
if (isset($_POST['alquilar'])) {
    $sagricultor->alquilaMaquina($sagricultor->findMaquinaById($_GET['codigo']));
    Sesion::escribir('sagricultor', $sagricultor);
    header("location:?menu=alquilarmaquina");
}
if (isset($_POST['cancelar'])) {
    header("location:?menu=alquilarmaquina");
}
?>

<h2>¿Confirmas que quieres alquilar la maquina con Codigo= <?= $_GET['codigo'] ?></h2>
<form action="" method="post">
    <input type="submit" value="Cancelar" name="cancelar" class="btn btn-primary">
    <input type="submit" value="alquilar" name="alquilar" class="btn btn-primary">
</form>