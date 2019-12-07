<?php
class Agricultor
{
    private $dni;
    private $nombre;
    private $apellidos;
    private $email;


    //Propiedad que nade de la relación entre Agricultor y parcela
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
     * Añade una nueva parcela a la colección
     * 
     * @param parcela $nuevaparcela
     * 
     * @return void
     */
    public function addparcela(parcela $nuevaparcela)
    {
        $this->parcelas[$nuevaparcela->getId_parcela()] = $nuevaparcela;
    }

    /**
     * Devuelve todas las parcelas
     *
     * @return array
     */
    public function allparcelas()
    {
        return $this->parcelas;
    }

    /**
     * Borra un parcela de la colección
     *
     * @param parcela $borradoparcela
     * 
     * @return void
     */
    public function removeparcela(parcela $borradoparcela)
    {
        unset($this->parcelas[$borradoparcela->getId_parcela()]);
    }

    /**
     * Modifica los datos de un parcela si existe
     *
     * @param parcela $modificaparcela
     * 
     * @return void
     */
    public function updateparcela(parcela $modificaparcela)
    {
        if (isset($this->parcelas[$modificaparcela->getId_parcela()])) {
            $this->parcelas[$modificaparcela->getId_parcela()] = $modificaparcela;
        }
    }

    public function findParcelaById(string $id)
    {
        return $this->parcelas[$id];
    }
}
