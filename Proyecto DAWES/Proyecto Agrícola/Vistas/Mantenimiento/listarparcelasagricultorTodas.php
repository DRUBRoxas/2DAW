<?php
Sesion::iniciar();
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();
?>

<h1>LISTADO DE PARCELAS</h1>
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
        $parcelas = $sagricultor->allParcelas();
        //Bucle para recorrer colección de Parcelas
        if ($parcelas != null) {
            foreach ($parcelas as $id => $parcela) {
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $parcela->getNombre() . "</td>";
                echo "<td>" . $parcela->getNum_parcela() . "</td>";
                echo "<td>" . $parcela->getNum_poligono() . "</td>";
                echo "<td>" . $parcela->getNum_Olivos() . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
</br>