<?php
Sesion::iniciar();
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();
?>

<h1>LISTADO DE ACTIVIDADES</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID ACTIVIDAD</th>
            <th scope="col">TITULO</th>
            <th scope="col">TIPO</th>
            <th scope="col">DESCRIPCION</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Bucle para recorrer colección de Parcelas
        if ($sagricultor->allActividades() != null) {
            foreach ($sagricultor->allActividades() as $idAct => $actividad) {
                echo "<tr>";
                echo "<td>" . $idAct . "</td>";
                echo "<td>" . $actividad->getTitulo() . "</td>";
                echo "<td>" . $actividad->getTipo() . "</td>";
                echo "<td>" . $actividad->getDescripcion() . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
</br>