<?php

class usuario
{
    private $usuario;
    private $pass;
    private $roles;

    //Constructor
    public function __construct(string $usuario, string $pass, array $roles)
    {
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->roles = $roles;
    }

    public static function getUsuarios()
    {
        return [new Usuario("manu@es.es", "1234", ["Administrador"])];
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getPass()
    {
        return $this->pass;
    }
}