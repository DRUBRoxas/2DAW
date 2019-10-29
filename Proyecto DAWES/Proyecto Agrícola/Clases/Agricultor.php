<?php
class Agricultor
{
    private $dni;
    private $nombre;
    private $apellidos;
    private $email;


    //Propiedad que nade de la relación entre Agricultor y Parcela
    private $parcelas;

    public function __construct(string $dni, string $nombre, string $apellidos, string $email)
    {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
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
     * Añade una nueva Parcela a la colección
     * 
     * @param Parcela $nuevaParcela
     * 
     * @return void
     */
    public function addParcela(Parcela $nuevaParcela)
    {
        $this->parcelas[$nuevaParcela->getId_parcela()] = $nuevaParcela;
    }
}
