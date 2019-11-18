<?php
class Usuario
{
    private $usuario;
    private $contrasena;
    private $roles;

    //Constructor
    public function __construct(string $usuario, string $contrasena, array $roles = null)
    {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
        if ($roles == null) {
            $this->roles = ["Estandar"];
        } else {

            $this->roles = $roles;
        }
    }


    public static function getUsuarios()
    {
        return [new Usuario("manu@agri.es", "1234", ["Administrador"])];
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
