<?php
//Recogida de datos
Sesion::iniciar();
if (!Login::UsuarioEstaLogueado()) {
    header("location:?menu=login&returnurl=nuevamaquina");
}
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();

}
//Si he realizado un submit
if (!empty($_POST)) {
    $valida->CadenaRango('Titulo', 1400);
    $valida->CadenaRango('contenido', 1400);

    if ($valida->ValidacionPasada()) {
        $titulo = $_POST["Titulo"];
        $contenido = $_POST["contenido"];
        $imagen = $_FILES['fichero'];
        
    }
}
?>
<form action="" method="post">
    Titulo:<input type="text" name="Titulo" class="form-control" required value="<?= $valida->getValor('Titulo') ?>"><br>
    <?= $valida->ImprimirError('Titulo') ?>
    Contenido:<textarea name="contenido" requerido class="form-control" value="<?= $valida->getValor('contenido') ?>"><br>
    <?= $valida->ImprimirError('contenido') ?>
    <input type='file' name='fichero'>
    <br>
    <input type="submit" value="Enviar" class="btn btn-primary">

</form>
<br>
<a href="?menu=alquilarmaquina">Volver a listado</a>