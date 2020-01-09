<?php
class GestionAnimales
{
    //Array de datos
    private $animales=array();
     public function __construct()
     {
         
     }

     /**
      * Crea un nuevo animal con array de vacunas vacio
      *
      * @param string $numeroChip
      * @param string $nombre
      * @param string $raza
      * @param string $fechaNacimiento
      * @return void
      */
     public function crearAnimal(string $numeroChip,string $nombre,string $raza,string $fechaNacimiento)
     {
        $this->animales[$numeroChip]=[$nombre,$raza,$fechaNacimiento,"vacunas"=>[]];
     }

     /**
      * borra un animal con sus vacunas
      *
      * @param string $numeroChip
      * @return void
      */
     public function borraAnimal(string $numeroChip)
     {
         unset($this->animales[$numeroChip]);
     }

     /**
      * Actualiza animal con nuevos datos
      *
      * @param string $numeroChip
      * @param array $nuevosDatos
      * @return void
      */
     public function modificaAnimal(string $numeroChip, array $nuevosDatos)
     {
         $this->animales[$numeroChip]=$nuevosDatos;
     }

     /**
      * Añade una nueva vacuna a un animal
      *
      * @param string $numeroChip
      * @param string $tipoVacuna
      * @param string $fechaVacuna
      * @param string $observaciones
      * @return void
      */
     public function nuevaVacuna(string $numeroChip, string $tipoVacuna, string $fechaVacuna, string $observaciones)
     {
         $this->animales[$numeroChip]["vacunas"][$tipoVacuna]=[$fechaVacuna,$observaciones];
     }

     /**
      * Modifica datos de una vacuna
      *
      * @param string $numeroChip
      * @param string $tipoVacuna
      * @param array $nuevosDatos
      * @return void
      */
     public function modificaVacuna(string $numeroChip,string $tipoVacuna,array $nuevosDatos)
     {
         $this->animales[$numeroChip]["vacunas"][$tipoVacuna]=$nuevosDatos;
     }

     /**
      * Devuelve la colección de animales
      *
      * @return array de animales
      */
     public function todosAnimales()
     {
         return $this->animales;
     }

     /**
      * Devuelve las vacunas de un animal
      *
      * @param string $numeroChip
      * @return array con las vacunas
      */
     public function vacunasAnimal(string $numeroChip)
     {
         return $this->animales[$numeroChip]["vacunas"];
     }
}