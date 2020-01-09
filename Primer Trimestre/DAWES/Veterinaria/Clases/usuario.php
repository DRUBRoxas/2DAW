<?php
class Usuario
{
    private $usuario;
    private $contrasena;
    private $roles;
    
    //Constructor
    public function __construct(string $usuario,string $contrasena,array $roles)
    {
        $this->usuario=$usuario;
        $this->contrasena=$contrasena;
        $this->roles=$roles;
    }


    public static function getUsuarios()
    {
        return [new Usuario("ivan@es.es","1234",["Administrador"])];
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
}