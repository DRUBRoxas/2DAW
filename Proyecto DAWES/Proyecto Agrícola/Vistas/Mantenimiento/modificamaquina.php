<?php
//Recogida de datos
Sesion::iniciar();
if (!Login::UsuarioEstaLogueado()) {
    header("location:?menu=login&returnurl=nuevamaquina");
}
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();

//Si he realizado un submit
if (!empty($_POST)) {
    //validamos los datos
    //validamos código
    $valida->EnteroRango('codigo');
    //valida el nombre, longitud máxima de 30
    $valida->CadenaRango('nombre', 30);
    //valida el precio por hora
    $valida->EnteroRango('precio_hora');
    //valida Fecha
    if ($valida->ValidacionPasada()) {
        $estado = false;
        $codigo = $_POST["codigo"];
        $nombre = $_POST["nombre"];
        $precio_hora = $_POST["precio_hora"];
        $fecha_compra = $_POST["fecha_compra"];
        $nuevaMaquina = new Maquina($codigo, $nombre, $precio_hora, $estado, $fecha_compra);
        $sagricultor->addMaquina($nuevaMaquina);
        Sesion::escribir("sagricultor", $sagricultor);
    }
}

if (isset($_POST['cancelar'])) {
    header("location:?menu=alquilarmaquinas");
} else {
    $maquina = $sagricultor->findMaquinaById($_GET['codigo']);
    $_POST['codigo'] = $maquina->getCodigo();
    $_POST['nombre'] = $maquina->getNombre();
    $_POST['precio_hora'] = $maquina->getPrecio_hora();
    $_POST['fecha_compra'] = $maquina->getFecha_Compra();
}

?>
<form action="" method="post">
    codigo:<input type="text" name="codigo" class="form-control" required value="<?= $valida->getValor('codigo') ?>"><br>
    <?= $valida->ImprimirError('codigo') ?>
    Nombre:<input type="text" name="nombre" requerido class="form-control" value="<?= $valida->getValor('nombre') ?>"><br>
    <?= $valida->ImprimirError('nombre') ?>
    Precio Hora:<input type="number" name="precio_hora" class="form-control" value="<?= $valida->getValor('precio_hora') ?>"><br>
    <?= $valida->ImprimirError('precio_hora') ?>
    Fecha Compra:<input type="date" name="fecha_compra" class="form-control"><br>
    <input type="submit" value="Enviar" class="btn btn-primary">

</form>
<br>
<a href="?menu=alquilarmaquina">Volver a listado</a>