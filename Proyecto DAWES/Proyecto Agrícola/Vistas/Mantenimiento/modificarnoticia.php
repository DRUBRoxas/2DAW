<?php
//Recogida de datos
Sesion::iniciar();
if (!Login::UsuarioEstaLogueado()) {
    header("location:?menu=login&returnurl=nuevamaquina");
}
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();
$noticias = $sagricultor->findNoticiaById($_GET['titulo']);
$imagen = $noticias->getImagen();

//Si he realizado un submit
if (!empty($_POST)) {
    $titulo = $_POST['Titulo'];
    $contenido = $_POST['contenido'];
    $nuevaNoticia = new Noticia($titulo, $contenido, $imagen);
    $sagricultor->updateNoticia($nuevaNoticia);
    Sesion::escribir("sagricultor", $sagricultor);
    $sagricultor->GrabarNoticias();
}
if (isset($_POST['cancelar'])) {
    header("location:?menu=listarnoticias");
} else {
    $_POST['Titulo'] = $noticias->getTitulo();
    $_POST['contenido'] = $noticias->getContenido();
}
?>
<form method="post" enctype=multipart/form-data> Titulo:<input type="text" name="Titulo" class="form-control" required value=""><br>
    Contenido:<textarea name="contenido" requerido class="form-control" value=""></textarea><br>
    <!--<input name="archivo" type="file" class="form-control"> <br>-->

    <input type="submit" value="Enviar" name="submit" class="btn btn-primary">

</form>
<br>
<a href="?menu=alquilarmaquina">Volver a listado</a>