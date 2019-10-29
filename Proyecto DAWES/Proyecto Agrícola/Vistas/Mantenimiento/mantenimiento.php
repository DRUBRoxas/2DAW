<?php
//Recogida de datos
Sesion::iniciar();
if (!Login::UsuarioEstaLogueado()) {
    header("location:?menu=login&returnurl=mantenimiento");
}
$sagricultor = Sesion::leer("sagricultor");
?>

<h1>MANTENIMIENTO DE AGRICULTORES</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Email</th>
            <th scope="col">Parcelas</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Bucle para recorrer colección de Agricultores
        if ($sagricultor->allAgricultores() != null) {
            foreach ($sagricultor->allAgricultores() as $dni => $agricultor) {
                echo "<tr>";
                echo "<td>" . $dni . "</td>";
                echo "<td>" . $agricultor->getNombre() . "</td>";
                echo "<td>" . $agricultor->getApellidos() . "</td>";
                echo "<td>" . $agricultor->getEmail() . "</td>";
                echo "<td><a href='?menu=borraagricultor&id=$dni'>BORRAR</a>&nbsp;
                 <a href='?menu=modificaagricultor&id=$dni'>MODIFICAR</a>
                 </td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
</br>
<a class="btn btn-primary" href="?menu=nuevoagricultor">Crear agricultor</a>