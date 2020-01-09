<?php
Sesion::iniciar();
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();
$dni = $_GET['dni'];
$agricultor = $sagricultor->findagricultorById($_GET['dni']);

//Si he realizado un submit
if (!empty($_POST)) {
    //validamos los datos
    //validamos el id de la parcela
    //  $valida->validarIDParcela('id_parcela');

    //valida el nombre, longitud minima de 3 y máxima de 20
    //$valida->CadenaRango('nombre', 20, 3);
    //valida el número de la parcela
    //$valida->EnteroRango('numeroParcela', 1);
    //valida el número de Polígono
    //$valida->EnteroRango('numeroPoligono', 1);
    //valida el numero de olivos
    //$valida->EnteroRango('NumeroOlivos', 1);
    $id_parcela = $_GET["id"];
    $nombre = $_POST["nombre"];
    $numeroParcela = $_POST["numeroParcela"];
    $numeroPoligono = $_POST["numeroPoligono"];
    $numeroOlivos = $_POST["NumeroOlivos"];
    $nuevaParcela = new Parcela($id_parcela, $nombre, $numeroParcela, $numeroPoligono, $numeroOlivos, $dni);
    $nuevaParcela->setEstado(Estado_Enum::MODIFICADO);
    $sagricultor->updateParcela($nuevaParcela);
    Sesion::escribir("sagricultor", $sagricultor);
}

if (isset($_POST['cancelar'])) {
    header("location:?menu=listarparcelasagricultor&dni=$dni");
} else {
    $Parcela = $sagricultor->findParcelaById($_GET['id']);
    $_POST['nombre'] = $Parcela->getNombre();
    $_POST['numeroParcela'] = $Parcela->getNum_parcela();
    $_POST['numeroPoligono'] = $Parcela->getNum_poligono();
    $_POST['NumeroOlivos'] = $Parcela->getNum_Olivos();
}
?>
<form action="" method="post">
    Nombre:<input type="text" name="nombre" class="form-control" value="<?= $valida->getValor('nombre') ?>"><br>
    <?= $valida->ImprimirError('nombre') ?>
    Numero Parcela:<input type="text" name="numeroParcela" class="form-control" value="<?= $valida->getValor('numeroParcela') ?>"><br>
    <?= $valida->ImprimirError('numeroParcela') ?>
    Numero Polígono:<input type="texto" name="numeroPoligono" class="form-control" value="<?= $valida->getValor('numeroPoligono') ?>"><br>
    <?= $valida->ImprimirError('numeroPoligono') ?>
    Numero Olivos:<input type="texto" name="NumeroOlivos" class="form-control" value="<?= $valida->getValor('NumeroOlivos') ?>"><br>
    <?= $valida->ImprimirError('NumeroOlivos') ?>
    <input type="submit" value="Enviar" class="btn btn-primary">

</form>
<br>
<?php
echo "<a class='btn btn-primary' href='?menu=listarparcelasagricultor&dni=$dni'>Volver a Listados</a>";
?>