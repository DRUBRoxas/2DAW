<?php
Sesion::iniciar();
$sagricultor = Sesion::leer('sagricultor');
if (isset($_POST['borrar'])) {
    $sagricultor->removeNoticia($sagricultor->findNoticiaById($_GET['titulo']));
    Sesion::escribir('sagricultor', $sagricultor);
    $sagricultor->GrabarNoticias();
    header("location:?menu=listarnoticias");
}
if (isset($_POST['cancelar'])) {
    header("location:?menu=listarnoticias");
}
?>

<h2>¿Confirmas que quieres borrar La noticia= <?= $_GET['titulo'] ?></h2>
<form action="" method="post">
    <input type="submit" value="Cancelar" name="cancelar" class="btn btn-primary">
    <input type="submit" value="Borrar" name="borrar" class="btn btn-primary">
</form>