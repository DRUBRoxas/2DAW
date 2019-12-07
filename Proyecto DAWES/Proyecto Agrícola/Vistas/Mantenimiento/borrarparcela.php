<?php
Sesion::iniciar();
$sagricultor = Sesion::leer('sagricultor');
$agricultor = $sagricultor->findagricultorById($_GET['dni']);
if (isset($_POST['borrar'])) {
    $agricultor->removeParcela($agricultor->findParcelaById($_GET['id']));
    Sesion::escribir('sagricultor', $sagricultor);
    header('location:?menu=listarparcelasagricultor&dni=' . $_GET['dni']);
}
if (isset($_POST['cancelar'])) {
    header('location:?menu=listarparcelasagricultor&dni=' . $_GET['dni']);
}
?>

<h2>¿Confirmas que quieres borrar La parcela con id= <?= $_GET['id'] ?></h2>
<form action="" method="post">
    <input type="submit" value="Cancelar" name="cancelar" class="btn btn-primary">
    <input type="submit" value="Borrar" name="borrar" class="btn btn-primary">
</form>