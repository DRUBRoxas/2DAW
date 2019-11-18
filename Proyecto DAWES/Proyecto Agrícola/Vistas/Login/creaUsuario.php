<?php
$sagricultor = Sesion::leer("sagricultor");
$valida = new Validacion();
class creaUsuario{
    if(isset($_POST['submit']))
    {
        $valida->Requerido('usuario');
        $valida->Requerido('contrasena');
        //Comprobamos validacion
        if($valida->ValidacionPasada())
        {
            if(!Login::ExisteUsuario($_POST['usuario']))
            {
               alert("este usuario ya existe");
            }
            else {
                $nombre=$_POST['nombre'];
                $contraseña=$_POST['contraseña'];
                
                $nuevoUsuario= new Usuario($nombre,$contraseña);
                $sagricultor->addUsuario($nuevoUsuario);
            }
        }
    }
}
?>
<form action="" method="post">
    Nombre:<input type="text" name="nombre" requerido class="form-control"
        value="<?= $valida->getValor('nombre') ?>"><br>
    <?= $valida->ImprimirError('nombre') ?>
    Contraseña:<input type="password" name="contraseña" class="form-control"><br>
    <input type="submit" value="Enviar" class="btn btn-primary">

</form>