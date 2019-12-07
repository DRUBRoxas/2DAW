<?php
Sesion::iniciar();
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();

//Si he realizado un submit
if (!empty($_POST)) {
    //validamos los datos
    //validamos el id de la parcela
    $valida->EnteroRango('id_actividad');

    //valida el titulo, longitud minima de 3 y máxima de 20
    $valida->CadenaRango('titulo', 45, 3);
    //valida el número de la parcela
    $valida->CadenaRango('tipo', 45, 3);
    //valida el número de Polígono
    $valida->EnteroRango('Descripcion', 1);
    //valida el numero de olivos
    $valida->EnteroRango('NumeroOlivos', 1);
    $dni = $_GET['dni'];
    $agricultor = $sagricultor->findagricultorById($_GET['dni']);
    if ($valida->ValidacionPasada()) {

        $id_actividad = $_POST["id_actividad"];
        $titulo = $_POST["titulo"];
        $tipo = $_POST["tipo"];
        $Descripcion = $_POST["Descripcion"];
        $nuevaActividad = new Actividad($id_actividad, $titulo, $tipo, $Descripcion,);
        $agricultor->addParcela($nuevaParcela);
        Sesion::escribir("sagricultor", $sagricultor);
    }
}
?>
<form action="" method="post">
    Id Parcela:<input type="text" name="id_actividad" class="form-control" value="<?= $valida->getValor('id_actividad') ?>"><br>
    <?= $valida->ImprimirError('id_actividad') ?>
    titulo:<input type="text" name="titulo" class="form-control" value="<?= $valida->getValor('titulo') ?>"><br>
    <?= $valida->ImprimirError('titulo') ?>
    Numero Parcela:<input type="text" name="tipo" class="form-control" value="<?= $valida->getValor('tipo') ?>"><br>
    <?= $valida->ImprimirError('tipo') ?>
    Numero Polígono:<input type="texto" name="Descripcion" class="form-control" value="<?= $valida->getValor('Descripcion') ?>"><br>
    <?= $valida->ImprimirError('Descripcion') ?>
    Numero Olivos:<input type="texto" name="NumeroOlivos" class="form-control" value="<?= $valida->getValor('NumeroOlivos') ?>"><br>
    <?= $valida->ImprimirError('NumeroOlivos') ?>
    <input type="submit" value="Enviar" class="btn btn-primary">

</form>
<br>
<?php
$dni = $_GET['dni'];

echo "<a class='btn btn-primary' href='?menu=listarparcelasagricultor&dni=$dni'>Volver al listado</a>";
?>