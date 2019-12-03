<?php
Sesion::iniciar();
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();

//Si he realizado un submit
if (!empty($_POST)) {
    //validamos los datos
    //validamos dni
    $valida->Dni('dni');

    //valida el nombre, longitud minima de 3 y máxima de 20
    $valida->CadenaRango('nombre', 20, 3);
    //valida los apellidos Longitud máxima de 30
    $valida->CadenaRango('apellidos', 30);
    //valida Email
    $valida->Email('email');

    if ($valida->ValidacionPasada()) {

        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $email = $_POST["email"];
        $nuevoAgricultor = new Agricultor($dni, $nombre, $apellidos, $email);
        $sagricultor->addAgricultor($nuevoAgricultor);
        Sesion::escribir("sagricultor", $sagricultor);
    }
}
?>
<form action="" method="post">
    DNI:<input type="text" name="dni" class="form-control" value="<?= $valida->getValor('dni') ?>"><br>
    <?= $valida->ImprimirError('dni') ?>
    Nombre:<input type="text" name="nombre" class="form-control" value="<?= $valida->getValor('nombre') ?>"><br>
    <?= $valida->ImprimirError('nombre') ?>
    Apellidos:<input type="text" name="apellidos" class="form-control"
        value="<?= $valida->getValor('apellidos') ?>"><br>
    <?= $valida->ImprimirError('apellidos') ?>
    Email:<input type="texto" name="email" class="form-control" value="<?= $valida->getValor('email') ?>"><br>
    <?= $valida->ImprimirError('dni') ?>
    <td><a href='?menu=nuevaparcela&dni=$dni'>NUEVA PARCELA</a>&nbsp</td>
    <input type="submit" value="Enviar" class="btn btn-primary">

</form>
<br>
<a href="?menu=mantenimiento">Volver a mantenimiento</a>