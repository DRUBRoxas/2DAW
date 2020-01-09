<?php
class Persona
{
    private $dni;
    private $nombre;
    private $edad;
    public static $numeroojos=2;

    private static $numeroorejas=2;
    
     public function __construct($dni,$nombre=null,$edad=null)
     {
         $this->dni=$dni;
         if($nombre!=null)
         {
             $this->nombre=$nombre;
         }
         if($edad!=null)
         {
             $this->edad=$edad;
         }
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
     * Get the value of edad
     */ 
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */ 
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get the value of numeroorejas
     */ 
    public function getNumeroorejas()
    {
        return self::$numeroorejas;
    }
    
}