<?php
Sesion::iniciar();
$sagricultor = Sesion::leer('sagricultor');
if (isset($_POST['borrar'])) {
    $sagricultor->removeMaquina($sagricultor->findMaquinaById($_GET['codigo']));
    Sesion::escribir('sagricultor', $sagricultor);
    header("location:?menu=alquilarmaquinas");
}
if (isset($_POST['cancelar'])) {
    header("location:?menu=alquilarmaquina");
}
?>

<h2>¿Confirmas que quieres borrar La maquina con Matricula= <?= $_GET['codigo'] ?></h2>
<form action="" method="post">
    <input type="submit" value="Cancelar" name="cancelar" class="btn btn-primary">
    <input type="submit" value="Borrar" name="borrar" class="btn btn-primary">
</form>