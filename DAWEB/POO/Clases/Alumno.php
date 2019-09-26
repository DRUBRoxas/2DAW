<?php
Class Alumno Extends Persona
{
    private $nota;
    public function __construct($dni,$nombre,$edad,$nota)
    {
        parent::__construct($dni,$nombre,$edad);
        $this->nota=$nota;
    }

    /**
     * Get the value of nota
     */ 
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * Set the value of nota
     *
     * @return  self
     */ 
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }
}
?>