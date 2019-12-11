<?php
Sesion::iniciar();
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();
$agricultor = $sagricultor->findagricultorById($_GET['dni']);
$parcela = $sagricultor->findParcelaById($_GET['id']);
$dni = $_GET['dni'];
$id = $_GET['id'];
$idAct = $_GET['idAct'];

//Si he realizado un submit
if (!empty($_POST)) {
    //validamos los datos
    /*
    $valida->CadenaRango('titulo', 45, 3);
    $valida->CadenaRango('tipo', 45, 3);
    $valida->CadenaRango('Descripcion', 100, 1);
    if ($valida->ValidacionPasada()) {
*/
    $id_actividad = $_POST["id_actividad"];
    $titulo = $_POST["titulo"];
    $tipo = $_POST["tipo"];
    $Descripcion = $_POST["Descripcion"];
    $nuevaActividad = new Actividad($id_actividad, $titulo, $tipo, $Descripcion, $id);
    $sagricultor->updateActividad($nuevaActividad);
    Sesion::escribir("sagricultor", $sagricultor);
    header("location:?menu=listaactividades&dni=$dni&id=$id");
    //  }
}
if (isset($_POST['cancelar'])) {
    header("location:?menu=listaactividades&dni=$dni&id=$id");
} else {
    $Actividad = $sagricultor->findActividadById($_GET['idAct']);
    $_POST['id_actividad'] = $Actividad->getId_actividad();
    $_POST['titulo'] = $Actividad->getTitulo();
    $_POST['tipo'] = $Actividad->getTipo();
    $_POST['Descripcion'] = $Actividad->getDescripcion();
}

?>
<form action="" method="post">
    Id Actividad:<input type="text" name="id_actividad" class="form-control" value="<?= $valida->getValor('id_actividad') ?>"><br>
    <?= $valida->ImprimirError('id_actividad') ?>
    titulo:<input type="text" name="titulo" class="form-control" value="<?= $valida->getValor('titulo') ?>"><br>
    <?= $valida->ImprimirError('titulo') ?>
    tipo:<input type="text" name="tipo" class="form-control" value="<?= $valida->getValor('tipo') ?>"><br>
    <?= $valida->ImprimirError('tipo') ?>
    Descripcion:<input type="texto" name="Descripcion" class="form-control" value="<?= $valida->getValor('Descripcion') ?>"><br>
    <?= $valida->ImprimirError('Descripcion') ?>
    <input type="submit" value="Enviar" name="enviar" class="btn btn-primary">
    <input type="submit" value="Cancelar" name="cancelar" class="btn btn-primary">


</form>
<br>