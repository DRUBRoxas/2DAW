<?php
Sesion::iniciar();
$sagricultor = Sesion::leer('sagricultor');
if (isset($_POST['borrar'])) {
    $sagricultor->removeagricultor($sagricultor->findagricultorById($_GET['id']));
    Sesion::escribir('sagricultor', $sagricultor);
    header("location:?menu=listaragricultores");
}
if (isset($_POST['cancelar'])) {
    header("location:?menu=listaragricultores");
}
?>

<h2>¿Confirmas que quieres borrar el agricultor con Nº Chip= <?= $_GET['id'] ?></h2>
<form action="" method="post">
    <input type="submit" value="Cancelar" name="cancelar" class="btn btn-primary">
    <input type="submit" value="Borrar" name="borrar" class="btn btn-primary">
</form>