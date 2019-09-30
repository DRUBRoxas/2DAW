<?php
class gestionAnimales
{
    //Array de datos
    private $animales = array();
    public function __construct()
    { }

    /**
     * Crea un nuevo animal con array de vacunas vacío
     *
     * @param String $numerochip
     * @param String $nombre
     * @param String $raza
     * @param String $fechaNacimiento
     * @return void
     */
    public function crearAnimal(String $numerochip, String $nombre, String $raza, String $fechaNacimiento)
    {
        //Asociativo
        $this->animales[$numerochip] = [$nombre, $raza, $fechaNacimiento, "vacunas" => []];
    }


    /**
     * Borra un animal con sus vacunas
     *
     * @param String $numerochip
     * @return void
     */
    public function borraAnimal(String $numerochip)
    {
        unset($this->animales[$numerochip]);
    }

    /**
     * Actualiza animal con nuevos datos
     *
     * @param String $numerochip
     * @param Array $nuevosDatos
     * @return void
     */
    public function modificarAnimal(String $numerochip, array $nuevosDatos)
    {
        $this->animales[$numerochip] = $nuevosDatos;
    }


    /**
     * Añade una nueva vacuna a un animal
     *
     * @param String $numerochip
     * @param String $tipoVacuna
     * @param String $fecha
     * @param String $observaciones
     * @return void
     */
    public function nuevaVacuna(String $numerochip, String $tipoVacuna, String $fecha, String $observaciones)
    {
        $this->animales[$numerochip]["vacunas"][$tipoVacuna] = [$fecha, $observaciones];
    }


    /**
     * Modifica Datos de una vacuna 
     *
     * @param String $numerochip
     * @param String $tipoVacuna
     * @param Array $nuevosDatosVacuna
     * @return void
     */
    public function modificaVacuna(String $numerochip, String $tipoVacuna, array $nuevosDatosVacuna)
    {
        $this->animales[$numerochip]["vacunas"][$tipoVacuna] = $nuevosDatosVacuna;
    }


    /**
     * Undocumented function
     *
     * @return void
     */
    public function todosAnimales()
    {
        return $this->animales;
    }


    public function VacunasAnimal($numerochip)
    {
        return $this->animales[$numerochip]["vacunas"];
    }
}