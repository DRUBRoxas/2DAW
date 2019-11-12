<?php
class Animal
{
    private $numeroChip;
    private $nombre;
    private $raza;
    private $fechaNacimiento;

    //Propiedad que nace de la relación entre animal y vacuna
    private $vacunas;
    
    //Constructor
    public function __construct(string $numeroChip,string $nombre,string $raza,DateTime $fechaNacimiento)
    {
        $this->numeroChip=$numeroChip;
        $this->nombre=$nombre;
        $this->raza=$raza;
        $this->fechaNacimiento=$fechaNacimiento;
    }

    /**
     * Get the value of numeroChip
     */ 
    public function getNumeroChip()
    {
        return $this->numeroChip;
    }

    /** 
     * Set the value of numeroChip
     *
     * @return  self
     */ 
    public function setNumeroChip($numeroChip)
    {
        $this->numeroChip = $numeroChip;

        return $this;
    }

    /**
     * Añade una nueva vacuna a la colección 
     *
     * @param Vacuna $nuevoVacuna
     * 
     * @return void
     */
    public function addVacuna(Vacuna $nuevoVacuna)
    {
        $this->vacunas[$nuevoVacuna->getTipoVacuna()]=$nuevoVacuna;
    }

    /**
     * Borra un Vacuna de la colección
     *
     * @param Vacuna $borradoVacuna
     * 
     * @return void
     */
    public function removeVacuna(Vacuna $borradoVacuna)
    {
        unset($this->vacunas[$borradoVacuna->getTipoVacuna()]);
    }

    /**
     * Modifica los datos de un Vacuna si existe
     *
     * @param Vacuna $modificaVacuna
     * 
     * @return void
     */
    public function updateVacuna(Vacuna $modificaVacuna)
    {
        if(isset($this->vacunas[$modificaVacuna->getTipoVacuna()]))
        {
            $this->vacunas[$modificaVacuna->getTipoVacuna()]=$modificaVacuna;
        }
    }

    /**
     * Devuelve la colección de Vacunas
     *
     * @return array
     */
    public function allVacuna()
    {
        return $this->vacunas;
    }

    /**
     * Devuelve una Vacuna
     * 
     *
     * @param string $numeroChip
     * @return Vacuna
     * 
     */
    public function findVacunaById(string $tipoVacuna)
    {
        return $this->vacunas[$tipoVacuna];
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
     * Get the value of raza
     */ 
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * Set the value of raza
     *
     * @return  self
     */ 
    public function setRaza($raza)
    {
        $this->raza = $raza;

        return $this;
    }

    /**
     * Get the value of fechaNacimiento
     */ 
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set the value of fechaNacimiento
     *
     * @return  self
     */ 
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }
}