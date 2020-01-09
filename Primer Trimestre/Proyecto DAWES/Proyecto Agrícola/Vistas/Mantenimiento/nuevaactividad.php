<?php
Sesion::iniciar();
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();
$agricultor = $sagricultor->findagricultorById($_GET['dni']);
$parcela = $sagricultor->findParcelaById($_GET['id']);
$dni = $_GET['dni'];
$id = $_GET['id'];
//Si he realizado un submit
if (!empty($_POST)) {
    //validamos los datos
    /*
    $valida->EnteroRango('id_actividad');
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
    $sagricultor->addActividad($nuevaActividad);
    Sesion::escribir("sagricultor", $sagricultor);
    //    }
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
    <input type="submit" value="Enviar" class="btn btn-primary">

</form>
<br>
<?php
$dni = $_GET['dni'];
$id = $_GET['id'];
echo "<a class='btn btn-primary' href='?menu=listaactividades&dni=$dni&id=$id'>Volver al listado</a>";
?>