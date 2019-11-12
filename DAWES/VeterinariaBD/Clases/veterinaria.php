<?php
class Veterinaria
{
    private $nombre;
    private $cif;

    //Propiedad que viene de la relación entre Veterinaria y Animal
    private $animales;

    //Constructor
    public function __construct(string $nombre,string $cif)
    {
        $this->nombre=$nombre;
        $this->cif=$cif;
    }

    /**
     * Añade un nuevo animal a la colección 
     *
     * @param Animal $nuevoAnimal
     * @return void
     */
    public function addAnimal(Animal $nuevoAnimal)
    {
        $this->animales[$nuevoAnimal->getNumeroChip()]=$nuevoAnimal;
    }

    /**
     * Borra un animal de la colección
     *
     * @param Animal $borradoAnimal
     * @return void
     */
    public function removeAnimal(Animal $borradoAnimal)
    {
        unset($this->animales[$borradoAnimal->getNumeroChip()]);
    }

    /**
     * Modifica los datos de un animal si existe
     *
     * @param Animal $modificaAnimal
     * @return void
     */
    public function updateAnimal(Animal $modificaAnimal)
    {
        if(isset($this->animales[$modificaAnimal->getNumeroChip()]))
        {
            $this->animales[$modificaAnimal->getNumeroChip()]=$modificaAnimal;
        }
    }

    /**
     * Devuelve la colección de animales
     *
     * @return array
     */
    public function allAnimal()
    {
        return $this->animales;
    }

    /**
     * Devuelve un animal
     *
     * @param string $numeroChip
     * @return Animal
     */
    public function findAnimalById(string $numeroChip)
    {
        return $this->animales[$numeroChip];
    }
}