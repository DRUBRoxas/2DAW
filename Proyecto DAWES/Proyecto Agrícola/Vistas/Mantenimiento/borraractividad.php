<?php
Sesion::iniciar();
$sagricultor = Sesion::leer('sagricultor');
$agricultor = $sagricultor->findagricultorById($_GET['dni']);
$parcela = $agricultor->findParcelaById($_GET['id']);
$dni = $_GET['dni'];
$id = $_GET['id'];
$idAct = $_GET['idAct'];

if (isset($_POST['borrar'])) {
    $parcela->removeActividad($parcela->findActividadById($_GET['idAct']));
    Sesion::escribir('sagricultor', $sagricultor);
    header("location:?menu=listaactividades&dni=$dni&id=$id");
}
if (isset($_POST['cancelar'])) {
    header("location:?menu=listaactividades&dni=$dni&id=$id");
}
?>

<h2>¿Confirmas que quieres borrar La actividad con id= <?= $_GET['idAct'] ?></h2>
<form action="" method="post">
    <input type="submit" value="Cancelar" name="cancelar" class="btn btn-primary">
    <input type="submit" value="Borrar" name="borrar" class="btn btn-primary">
</form>