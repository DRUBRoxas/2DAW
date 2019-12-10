<?php
class Agricultor
{
    public $dni;
    public $nombre;
    public $apellidos;
    public $email;
    public $estado;


    //Propiedad que nade de la relación entre Agricultor y parcela


    public function __construct(string $dni = '', string $nombre = '', string $apellidos = '', string $email = '')
    {
        $this->dni = empty($dni) ? $this->dni : $dni;
        $this->nombre =  empty($nombre) ? $this->nombre : $nombre;
        $this->apellidos =  empty($apellidos) ? $this->apellidos : $apellidos;
        $this->email = empty($email) ? $this->email : $email;
        $this->estado = Estado_Enum::SIN_CAMBIOS;
    }

    /**
     * Get the value of dni
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set the value of dni
     *
     * @return  self
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

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

    /**
     * Get the value of apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Añade una nueva parcela a la colección
     * 
     * @param parcela $nuevaparcela
     * 
     * @return void
     */

    public function getAgricultores()
    {
        $bd = new GBD("127.0.0.1", "agricultor", "root", "");
        $agricultores = $bd->getAll("Agricultor");
        return $agricultores;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}
