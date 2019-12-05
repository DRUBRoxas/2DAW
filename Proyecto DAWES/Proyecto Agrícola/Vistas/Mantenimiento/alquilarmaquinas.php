<?php
//Recogida de datos
Sesion::iniciar();
if (!Login::UsuarioEstaLogueado()) {
    header("location:?menu=login&returnurl=mantenimiento");
}
$sagricultor = Sesion::leer("sagricultor");
?>

<h1>Maquinas para alquilar</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio por Hora</th>
            <th scope="col">Fecha de Compra</th>
            <th scope="col">Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Bucle para recorrer colección de Maquinas
        if ($sagricultor->allMaquinas() != null) {
            foreach ($sagricultor->allMaquinas() as $codigo => $maquinas) {
                echo "<tr>";
                echo "<td>" . $codigo . "</td>";
                echo "<td>" . $maquinas->getNombre() . "</td>";
                echo "<td>" . $maquinas->getPrecio_Hora() . "</td>";
                echo "<td>" . $maquinas->getFecha_compra() . "</td>";
                echo "<td>" . $maquinas->getEstado() . "</td>";
                echo "<td><a href='?menu=alquilar&codigo=$codigo'>ALQUILAR </a>&nbsp</td>";
                echo "<td><a href='?menu=borramaquina&codigo=$codigo'>BORRAR</a>&nbsp;
                 <a href='?menu=modificamaquina&codigo=$codigo'>MODIFICAR</a>
                 </td>";
                echo "</tr>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
</br>
<a class="btn btn-primary" href="?menu=nuevamaquina">Crear Maquina</a>