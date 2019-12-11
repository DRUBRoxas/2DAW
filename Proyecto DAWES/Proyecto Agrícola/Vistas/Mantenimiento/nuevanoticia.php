<?php
//Recogida de datos
/*Sesion::iniciar();
if (!Login::UsuarioEstaLogueado()) {
    header("location:?menu=login&returnurl=nuevamaquina");
}
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();
*/
//Si he realizado un submit
if (!empty($_POST)) {
    $nombre_archivo = $_FILES['archivo']['name']; //Obteniendo el nombre del archivo
    $ruta_destino = "../../ImagenesNoticias/";

    //$_SERVER['DOCUMENT_ROOT'] = la carpeta raiz donde esta el proyecto
    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . $ruta_destino;

    //Movemos el archivo al directorio temp al directorio deseado.

    move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $carpeta_destino . $nombre_archivo);
}
?>
<form action="" method="post">
    Titulo:<input type="text" name="Titulo" class="form-control" required value=""><br>
    Contenido:<textarea name="contenido" requerido class="form-control" value=""></textarea><br>
    <input type='file' id="archivo" name='archivo'>
    <br>
    <input type="submit" value="Enviar" class="btn btn-primary">

</form>
<br>
<a href="?menu=alquilarmaquina">Volver a listado</a>