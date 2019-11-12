<?php
    Sesion::iniciar();
    $sanimal=Sesion::leer('veterinaria');
    if(isset($_POST['borrar']))
    {
        $sanimal->removeAnimal($sanimal->findAnimalById($_GET['id']));
        Sesion::escribir('veterinaria',$sanimal);
        header("location:?menu=mantenimiento");
    }
    if(isset($_POST['cancelar']))
    {
        header("location:?menu=mantenimiento");
    }
?>

<h2>¿Confirmas que quieres borrar el animal con Nº Chip= <?= $_GET['id']?></h2>
<form action="" method="post">
<input type="submit" value="Cancelar" name="cancelar" class="btn btn-primary">
<input type="submit" value="Borrar" name="borrar" class="btn btn-primary">
</form>