<?php
class Vacuna
{
    private $tipoVacuna;
    private $fechaVacuna;
    private $observaciones;
    
    //Constructor
    public function __construct(string $tipoVacuna,DateTime $fechaVacuna,string $observaciones)
    {
        $this->tipoVacuna=$tipoVacuna;
        $this->fechaVacuna=$fechaVacuna;
        $this->observaciones=$observaciones;
    }

    /**
     * Get the value of tipoVacuna
     */ 
    public function getTipoVacuna()
    {
        return $this->tipoVacuna;
    }

    /**
     * Set the value of tipoVacuna
     *
     * @return  self
     */ 
    public function setTipoVacuna($tipoVacuna)
    {
        $this->tipoVacuna = $tipoVacuna;

        return $this;
    }
}