<?php
class Roles_has_usuario
{
    private $roles_idRoles;
    private $usuario_nombre;

    /**
     * Get the value of roles_idRoles
     */
    public function getRoles_idRoles()
    {
        return $this->roles_idRoles;
    }

    /**
     * Set the value of roles_idRoles
     *
     * @return  self
     */
    public function setRoles_idRoles($roles_idRoles)
    {
        $this->roles_idRoles = $roles_idRoles;

        return $this;
    }

    /**
     * Get the value of usuario_nombre
     */
    public function getUsuario_nombre()
    {
        return $this->usuario_nombre;
    }

    /**
     * Set the value of usuario_nombre
     *
     * @return  self
     */
    public function setUsuario_nombre($usuario_nombre)
    {
        $this->usuario_nombre = $usuario_nombre;

        return $this;
    }
}
