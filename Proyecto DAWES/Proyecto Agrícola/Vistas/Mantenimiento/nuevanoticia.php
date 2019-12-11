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
    $target_dir = "ImagenesNoticias/";
    $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["archivo"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    if ($_FILES["archivo"]["size"] > 200000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "No se ha subido el Archivo";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
            echo "El archivo " . basename($_FILES["archivo"]["name"]) . " has been uploaded.";

            $titulo = $_POST['Titulo'];
            $contenido = $_POST['contenido'];

            $nuevaNoticia = new Noticia($titulo, $contenido, $target_file);
            $nuevaNoticia->setEstado(Estado_Enum::MODIFICADO);
            $sagricultor->updateNoticia($nuevaNoticia);
            Sesion::escribir("sagricultor", $sagricultor);
            $sagricultor->GrabarNoticias();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    //lo demás

}

?>
<form method="post" enctype=multipart/form-data> Titulo:<input type="text" name="Titulo" class="form-control" required value=""><br>
    Contenido:<textarea name="contenido" requerido class="form-control" value=""></textarea><br>
    <input name="archivo" type="file" class="form-control"> <br>

    <input type="submit" value="Enviar" name="submit" class="btn btn-primary">

</form>
<br>
<a href="?menu=alquilarmaquina">Volver a listado</a>