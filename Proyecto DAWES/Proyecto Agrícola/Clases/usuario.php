<?php
class Usuario
{
    private $usuario;
    private $contrasena;
    private $roles=null;
    
    //Constructor
    /*public function __construct(string $usuario,string $contrasena,array $roles)
    {
        $this->usuario=$usuario;
        $this->contrasena=$contrasena;
        $this->roles=$roles;
    }*/


    public static function getUsuarios()
    {
        //return [new Usuario("ivan@es.es","1234",["Administrador"])];
        $bd=new GBD("127.0.0.1","veterinaria","root","higuera2@");
        $usuarios=$bd->getAll("usuario");
        foreach ($usuarios as $usuario) {
            $idroles=$bd->findByOne("usuario_has_rol",["usuario_usuario"=>$usuario->getUsuario()]);
            $roles=null;
            foreach ($idroles as $idrol ) {
                $roles[]=$bd->findById("rol",$idrol->rol_idRol)[0];
            }
            $usuario->setRoles($roles);
        }
        return $usuarios;

    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Get the value of contrasena
     */ 
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set the value of roles
     *
     * @return  self
     */ 
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
}