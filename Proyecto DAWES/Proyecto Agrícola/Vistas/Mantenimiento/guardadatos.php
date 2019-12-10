<?php
Sesion::iniciar();
$sagricultor = Sesion::leer('sagricultor');
if (isset($_POST['Enviar'])) {
    $sagricultor->GrabarAgricultores();
    header('location:?menu=listaragricultores');
}
if (isset($_POST['cancelar'])) {
    header('location:?menu=listaragricultores');
}
?>

<h2>¿Confirmas que quieres Guardar los datos?</h2>
<form action="" method="post">
    <input type="submit" value="Cancelar" name="cancelar" class="btn btn-primary">
    <input type="submit" value="Enviar" name="Enviar" class="btn btn-primary">
</form>