<?php
if (isset($_FILES['fichero'])) {

    move_uploaded_file($_FILES['fichero']['tmp_name'], "./imagenes/imagen1.jpg");
}
if (isset($_FILES['fichero2'])) {

    $foto = file_get_contents($_FILES['fichero2']['tmp_name']);
    $foto = base64_encode($foto);
}
?>

<form action='' method='post' enctype='multipart/form-data'>
    Selecciona fichero:
    <input type='file' name='fichero'>
    <br>

    <input type='file' name='fichero2'>
    <br>
    <input type='submit' value='Enviar'>
</form>

<?php
if (isset($_FILES['fichero'])) {
    echo "<img src='./imagenes/imagen1.jpg' alt='Esto es una imagen'>";
}

if (isset($_FILES['fichero2'])) {
    echo "<img src='data:image/png;base64,$foto' title='var'>";
}