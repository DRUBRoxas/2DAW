<?php
//Recogida de datos
Sesion::iniciar();
if (!Login::UsuarioEstaLogueado()) {
    header("location:?menu=login&returnurl=mantenimiento");
}
$sagricultor = Sesion::leer("sagricultor");
?>

<h1>Noticias</h1>

<?php

if ($sagricultor->allNoticias() != null) {
    foreach ($sagricultor->allNoticias() as $titulo => $noticias) { {
            echo "<div class=\"col-3\">
        <div class=\"card\">
            <img src=\"$noticias->imagen\" class=\"card-img-top\" alt=\"...\">
            <div class=\"card-body\">
                <h2 class=\"card-title\">$noticias->titulo</h2>
                <p class=\"card-text\">$noticias->contenido</p>
                <a href=\"?menu=borrarNoticia&titulo=$noticias->titulo\" type=\"button\" class=\"btn btn-primary btn-lg\">Borrar</a>
                <a href=\"?menu=modificaNoticia&titulo=$noticias->titulo\" type=\"button\" class=\"btn btn-primary btn-lg\">Modificar</a>
            </div>
        </div>
    </div>
    <hr>";
        }
    }
}
?>

<?php
echo "<a class='btn btn-primary' href='?menu=crearnoticia'>NuevaNoticia</a>";
?>