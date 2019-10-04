<?php
    //Si he realizado un submit
    if(!empty($_POST))
    {
        $nchip=$_POST["numerochip"];
        $nombre=$_POST["nombre"];
        $raza=$_POST["raza"];
        $fnacimiento=$_POST["fechanacimiento"];
        $nuevoAnimal=new Animal($nchip,$nombre,$raza,$fnacimiento);
        $sanimal->addAnimal($nuevoAnimal);
    }
?>
<form action="" method="post">
Nº Chiop:<input type="text" name="numerochip" class="form-control"><br>
Nombre:<input type="text" name="nombre" class="form-control"><br>
Raza:<input type="text" name="raza" class="form-control"><br>
Fecha de Nacimiento:<input type="date" name="fechanacimiento" class="form-control">
<br>
<input type="submit" value="Enviar" class="btn btn-primary">
</form>