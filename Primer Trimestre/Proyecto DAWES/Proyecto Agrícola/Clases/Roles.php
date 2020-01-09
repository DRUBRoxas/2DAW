<?php
class Roles
{
    private $idRoles;
    private $nombre;

    /**
     * Get the value of idRoles
     */
    public function getIdRoles()
    {
        return $this->idRoles;
    }

    /**
     * Set the value of idRoles
     *
     * @return  self
     */
    public function setIdRoles($idRoles)
    {
        $this->idRoles = $idRoles;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}
