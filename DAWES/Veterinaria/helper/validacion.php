<?php
class Validacion
{
    //Array de errores
    private $errores;

    //Constructor
    public function __construct()
    {
        $this->errores = array();
    }

    /**
     * Comprueba si esta vacio
     *
     * @param [type] $campo
     * @return boolean
     */
    public function Requerido($campo)
    {
        if (!isset($_POST[$campo]) || empty($_POST[$campo])) {
            $this->errores[$campo] = "El campo $campo no puede estar vacio";
            return false;
        }
        return true;
    }

    public function EnteroRango($campo, $min = PHP_INT_MIN, $max = PHP_INT_MAX)
    {
        if ($campo > $max && $campo < $min) {
            return true;
        } else {
            return false;
        }
    }

    public function CadenaRango($campo, $max, $min = 0)
    {
        if (strlen($campo) < $max && strlen($campo) > $min) {
            return true;
        } else {
            return false;
        }
    }

    public function Email($campo)
    {
        if (filter_var($campo, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function DNI($campo)
    {
        function validar_dni($campo)
        {
            $letra = substr($campo, -1);
            $numeros = substr($campo, 0, -1);
            if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
                return true;
            } else {
                return false;
            }
        }
    }
}