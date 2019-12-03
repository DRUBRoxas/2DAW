<?php
class Login
{
    public static function Identifica(string $usuario,string $contrasena,bool $recuerdame)
    {
        if(self::ExisteUsuario($usuario,$contrasena))
        {
            Sesion::iniciar();
            Sesion::escribir('login',$usuario); 
            if($recuerdame)
            {
                setcookie('recuerdame',$usuario,time()+30*24*60*60);
            }
            return true;
        }
        return false;
    }

    private static function ExisteUsuario(string $usuario,string $contrasena=null)
    {
        foreach (Usuario::getUsuarios() as $usuarioitem) {
            if($usuarioitem->getUsuario()==$usuario && 
            is_null($contrasena)?true:$usuarioitem->getContrasena()==$contrasena)
            {
                return true;
            }
        }
        return false;
    }

    public static function UsuarioEstaLogueado()
    {
        if(Sesion::leer('login'))
        {
            return true;
        }
        elseif(isset($_COOKIE['recuerdame']) && self::ExisteUsuario($_COOKIE['recuerdame']))
        {
            Sesion::iniciar();
            Sesion::escribir('login',$_COOKIE['recuerdame']);
            return true;
        }
        return false;
    }
}