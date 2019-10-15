<?php
class Login
{
    public static function Identifica(string $usuario, string $contrasena, bool $recuerdame)
    {
        if (self::ExisteUsuario($usuario, $contrasena)) {
            Sesion::iniciar();
            Sesion::escribir('login', '$usuario');
            if ($recuerdame) {
                setcookie('recuerdame', $usuario, time() + 30 * 24 * 60 * 60);
            }
            return true;
        }
        return false;
    }

    public static function ExisteUsuario(string $usuario, string $contrasena = null)
    {
        foreach (Usuario::getUsuarios() as $usuarioItem) {
            if ($usuarioItem->getUsuario() == $usuario &&
                is_null($contrasena) ? true : $usuarioItem->getContrasena() == $contrasena
            ) {
                return true;
            }
        }
        return false;
    }

    public static function UsuarioEstaLogueado()
    {
        if (Sesion::leer('login')) {
            return true;
        } else if (isset($_COOKIE['recuerdame']) && self::ExisteUsuario($_COOKIE['recuerdame'])) {
            Sesion::iniciar();
            Sesion::escribir('login', $_COOKIE['recuerdame']);
            return true;
        }
    }
}