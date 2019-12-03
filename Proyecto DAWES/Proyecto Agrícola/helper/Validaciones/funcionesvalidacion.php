<?php
class FuncionesValidacion
{
    public static function ValidaFechaNacimiento()     
    {
        $fecha= new DateTime($_POST['fechanacimiento']);
        $fechaactual= new DateTime('NOW');
        if($fecha > $fechaactual)
        {
            return false;
        }
        return true;
    }
}