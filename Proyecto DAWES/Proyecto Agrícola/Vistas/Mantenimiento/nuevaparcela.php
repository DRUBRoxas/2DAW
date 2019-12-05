<?php
Sesion::iniciar();
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();

//Si he realizado un submit
if (!empty($_POST)) {
    //validamos los datos
    //validamos dni
    $valida->validarIDParcela(id_parcela);

    //valida el nombre, longitud minima de 3 y máxima de 20
    $valida->CadenaRango('nombre', 20, 3);
    //valida el número de la parcela
    $valida->EnteroRango('numeroParcela', 1);
    //valida el número de Polígono
    $valida->EnteroRango('numeroPoligono', 1);
    //valida el numero de olivos
    $valida->EnteroRango('NumeroOlivos', 1);

    if ($valida->ValidacionPasada()) {

        $id_parcela = $_POST["id_parcela"];
        $nombre = $_POST["nombre"];
        $numeroParcela = $_POST["numeroParcela"];
        $numeroPoligono = $_POST["numeroPoligono"];
        $numeroOlivos = $_POST["numeroOlivos"];
        $nuevaParcela = new Parcela($id_parcela, $nombre, $numeroParcela, $numeroPoligono, $numeroOlivos);
        $sagricultor->addAgricultor($nuevoAgricultor);
        Sesion::escribir("sagricultor", $sagricultor);
    }
}
?>
<form action="" method="post">
    Id Parcela:<input type="text" name="id_parcela" class="form-control" value="<?= $valida->getValor('id_parcela') ?>"><br>
    <?= $valida->ImprimirError('id_parcela') ?>
    Nombre:<input type="text" name="nombre" class="form-control" value="<?= $valida->getValor('nombre') ?>"><br>
    <?= $valida->ImprimirError('nombre') ?>
    Numero Parcela:<input type="text" name="numeroParcela" class="form-control" value="<?= $valida->getValor('numeroParcela') ?>"><br>
    <?= $valida->ImprimirError('numeroParcela') ?>
    Numero Polígono:<input type="texto" name="numeroPoligono" class="form-control" value="<?= $valida->getValor('numeroPoligono') ?>"><br>
    <?= $valida->ImprimirError('numeroPoligono') ?>
    Numero Olivos:<input type="texto" name="email" class="form-control" value="<?= $valida->getValor('NumeroOlivos') ?>"><br>
    <?= $valida->ImprimirError('dni') ?>
    <input type="submit" value="Enviar" class="btn btn-primary">

</form>
<br>
<a href="?menu=mantenimiento">Volver a mantenimiento</a>