<?php
Sesion::iniciar();
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();
$agricultor = $sagricultor->findagricultorById($_GET['dni']);
$parcela = $sagricultor->findParcelaById($_GET['id']);
$dniag = $_GET['dni'];
$id = $_GET['id'];
?>

<h1>MANTENIMIENTO DE ACTIVIDADES</h1>
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
                if ($actividad->getId_parcela() === $id) {
                    echo "<tr>";
                    echo "<td>" . $idAct . "</td>";
                    echo "<td>" . $actividad->getTitulo() . "</td>";
                    echo "<td>" . $actividad->getTipo() . "</td>";
                    echo "<td>" . $actividad->getDescripcion() . "</td>";
                    echo "<td><a href='?menu=borraactividad&id=$id&dni=$dniag&idAct=$idAct'>BORRAR</a>&nbsp;
                     <a href='?menu=modificaactividad&id=$id&dni=$dniag&idAct=$idAct'>MODIFICAR</a>
                     </td>";
                    echo "</tr>";
                }
            }
        }
        ?>
    </tbody>
</table>
</br>
<?php
echo "<a class='btn btn-primary' href='?menu=nuevaactividad&dni=$dniag&id=$id'>Crear Actividad</a>";
echo "<a class='btn btn-primary' href='?menu=guardadatos'>Guardar Datos</a>";
?>