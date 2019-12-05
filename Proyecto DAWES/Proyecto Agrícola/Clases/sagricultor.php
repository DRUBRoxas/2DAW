<?php
class Sagricultor
{
    private $nombre;
    private $cif;

    //Propiedad que viene de la relación entre La empresa y Agricultor
    private $agricultores;
    private $maquinas;
    //Constructor
    public function __construct(string $nombre, string $cif)
    {
        $this->nombre = $nombre;
        $this->cif = $cif;
    }

    /**
     * Añade un nuevo agricultor a la colección 
     *
     * @param Agricultor $nuevoAgricultor
     * @return void
     */
    public function addAgricultor(Agricultor $nuevoAgricultor)
    {
        $this->agricultores[$nuevoAgricultor->getDni()] = $nuevoAgricultor;
    }

    /**
     * Borra un agricultor de la colección
     *
     * @param Agricultor $borradoAgricultor
     * @return void
     */
    public function removeAgricultor(Agricultor $borradoAgricultor)
    {
        unset($this->agricultores[$borradoAgricultor->getDNI()]);
    }

    public function alquilaMaquina(Maquina $alquilaMaquina)
    {
        $alquilaMaquina->setEstado(true);
    }
    /**
     * Modifica los datos de un agricultor si existe
     *
     * @param Agricultor $modificaAgricultor
     * @return void
     */
    public function updateAgricultor(Agricultor $modificaAgricultor)
    {
        if (isset($this->agricultores[$modificaAgricultor->getDNI()])) {
            $this->agricultores[$modificaAgricultor->getDNI()] = $modificaAgricultor;
        }
    }

    /**
     * Devuelve la colección de agricultores
     *
     * @return array
     */
    public function allAgricultores()
    {
        return $this->agricultores;
    }

    /**
     * Devuelve un agricultor
     *
     * @param string $dni
     * @return Agricultor
     */
    public function findAgricultorById(string $dni)
    {
        return $this->agricultores[$dni];
    }

    public function findMaquinaById(string $Codigo)
    {
        return $this->maquinas[$Codigo];
    }


    public function addMaquina(Maquina $nuevaMaquina)
    {
        $this->maquinas[$nuevaMaquina->getCodigo()] = $nuevaMaquina;
    }

    public function removeMaquina(Maquina $borradoMaquina)
    {
        unset($this->maquinas[$borradoMaquina->getCodigo()]);
    }

    public function updateMaquina(Maquina $modificaMaquina)
    {
        if (isset($this->maquinas[$modificaMaquina->getCodigo()])) {
            $this->maquinas[$modificaMaquina->getCodigo()] = $modificaMaquina;
        }
    }

    /**
     * Devuelve la colección de maquinas
     *
     * @return array
     */
    public function allMaquinas()
    {
        return $this->maquinas;
    }
}
