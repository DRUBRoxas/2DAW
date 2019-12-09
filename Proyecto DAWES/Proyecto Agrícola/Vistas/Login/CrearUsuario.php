<?php
$valida = new Validacion();
$bd = new GBD("127.0.0.1", "agricultor", "root", "");
if (isset($_POST['submit'])) {
    $valida->Requerido('usuario');
    $valida->Requerido('contrasena');
    //Comprobamos validacion
    if ($valida->ValidacionPasada()) {
        if (Login::ExisteUsuario($_POST['usuario'])) {
            $mensaje = "Usuario ya Registrado";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $usuario = ["usuario" => $_POST['usuario'], "contrasena" => $_POST['contrasena']];
            $bd->add("usuario", $usuario);
            header("location:?menu=mantenimiento");
        }
    }
}
?>
<div class='w-50 p-3 container'>
    <div class='login-form'>
        <form action='' method='post' novalidate>
            <h2 class='text-center'>Registrarse</h2>
            <div class='form-group'>
                <input type='text' class='form-control' name='usuario' placeholder='Usuario' required='required'>
                <?= $valida->ImprimirError('usuario') ?>
            </div>
            <div class='form-group'>
                <input type='password' class='form-control' name='contrasena' placeholder='Contraseña' required='required'>
                <?= $valida->ImprimirError('contrasena') ?>
            </div>
            <div class='form-group'>
                <button type='submit' name='submit' class='btn btn-primary btn-block'>Registrarse</button>
            </div>
        </form>
    </div>
</div>