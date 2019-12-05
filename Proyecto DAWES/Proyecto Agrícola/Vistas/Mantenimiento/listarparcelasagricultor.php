<?php
Sesion::iniciar();
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();
$agricultor = $sagricultor->findagricultorById($_GET['dni']);
?>

<h1>MANTENIMIENTO DE AGRICULTORES</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Parcela</th>
            <th scope="col">Nombre</th>
            <th scope="col">Numero Parcela</th>
            <th scope="col">Numero Polígono</th>
            <th scope="col">Numero Olivos</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //Bucle para recorrer colección de Parcelas
        if ($agricultor->allParcelas() != null) {
            foreach ($agricultor->allParcelas() as $id => $parcela) {
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $parcela->getNombre() . "</td>";
                echo "<td>" . $parcela->getNum_parcela() . "</td>";
                echo "<td>" . $parcela->getNum_poligono() . "</td>";
                echo "<td>" . $parcela->getNum_Olivos() . "</td>";

                echo "<td><a href='?menu=listaactividades&id=$id'>LISTAR ACTIVIDADES</a>&nbsp</td>";
                echo "<td><a href='?menu=borraparcela&id=$id'>BORRAR</a>&nbsp;
                 <a href='?menu=modificaparcela&id=$id'>MODIFICAR</a>
                 </td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
</br>
<a class="btn btn-primary" href="?menu=nuevaparcela">Crear Parecla</a>