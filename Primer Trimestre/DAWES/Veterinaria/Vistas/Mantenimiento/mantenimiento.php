<?php
    //Recogida de datos
    Sesion::iniciar();
    if(!Login::UsuarioEstaLogueado())
    {
      header("location:?menu=login&returnurl=mantenimiento");
    }
    $sanimal = Sesion::leer("veterinaria");
?>
<h1>MANTENIMIENTO DE ANIMALES</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nº Chip</th>
      <th scope="col">Nombre</th>
      <th scope="col">Raza</th>
      <th scope="col">Fecha Nacimiento</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
     <?php
         //$sanimal->addAnimal(new Animal("111S","Luna","York", new DateTime('now')));
         //Bucle para recorrer colección de animales
         if ($sanimal->allAnimal() != null) {
             foreach ($sanimal->allAnimal() as $numerochip => $animal) {
                 echo "<tr>";
                 echo "<td>" . $numerochip . "</td>";
                 echo "<td>" . $animal->getNombre() . "</td>";
                 echo "<td>" . $animal->getRaza() . "</td>";
                 echo "<td>" . $animal->getFechaNacimiento()->format('Y-m-d H:i:s') . "</td>";
                 echo "<td><a href='?menu=borraanimal&id=$numerochip'>BORRAR</a>&nbsp;
                 <a href='?menu=modificaanimal&id=$numerochip'>MODIFICAR</a>
                 </td>";
                 echo "</tr>";

             }
         }
     ?>
  </tbody>
</table>
</br>
<a class="btn btn-primary" href="?menu=nuevoanimal">Crear Animal</a>