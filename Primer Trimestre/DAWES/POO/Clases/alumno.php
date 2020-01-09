<?php
class Alumno extends Persona
{
    private $nota;
     public function __construct($dni,$nombre,$edad,$nota)
     {
         parent::__construct($dni,$nombre,$edad);
         $this->nota=$nota;
     }
}