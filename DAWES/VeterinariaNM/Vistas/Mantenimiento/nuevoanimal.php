<?php
    Sesion::iniciar();
    $sanimal = Sesion::leer("veterinaria");
    $valida = new Validacion();
    //Si he realizado un submit
    if (!empty($_POST)) {
        //Validamos los datos
        //Validar el número de chip 99-9999-AA
        $valida->Patron('numerochip', '/^[0-9]{2}\-[0-9]{4}\-[A-Z]{2}$/');
        //Valida el nombre longitud mínima de 5 y máxima de 20
        $valida->CadenaRango('nombre', 20, 5);
        //Valida la raza longitud máxima 15
        $valida->CadenaRango('raza', 15);
        //Valida fecha nacimiento. La fecha tiene que ser igual o anterior a la actual
        $valida->ValidaConFuncion('fechanacimiento', 'FuncionesValidacion::ValidaFechaNacimiento',
            "La fecha de nacimiento debe ser igual o anterior a la actual");

        if ($valida->ValidacionPasada()) {

            $nchip = $_POST["numerochip"];
            $nombre = $_POST["nombre"];
            $raza = $_POST["raza"];
            $fnacimiento = $_POST["fechanacimiento"];
            $nuevoAnimal = new Animal($nchip, $nombre, $raza, new DateTime($fnacimiento));
            $sanimal->addAnimal($nuevoAnimal);
            Sesion::escribir("veterinaria", $sanimal);
        }
    }
?>
<form action="" method="post">
Nº Chip:<input type="text" name="numerochip" class="form-control" value="<?= $valida->getValor('numerochip') ?>"><br>
<?= $valida->ImprimirError('numerochip') ?>
Nombre:<input type="text" name="nombre" class="form-control" value="<?= $valida->getValor('nombre') ?>"><br>
<?= $valida->ImprimirError('nombre') ?>
Raza:<input type="text" name="raza" class="form-control" value="<?= $valida->getValor('raza') ?>"><br>
<?= $valida->ImprimirError('raza') ?>
Fecha de Nacimiento:<input type="date" name="fechanacimiento" class="form-control" value="<?= $valida->getValor('fechanacimiento') ?>">
<br>
<?= $valida->ImprimirError('fechanacimiento') ?>
<input type="submit" value="Enviar" class="btn btn-primary">
</form>
<br>
<a href="?menu=mantenimiento">Volver a mantenimiento</a>
