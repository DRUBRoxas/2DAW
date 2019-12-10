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
        $this->CargarAgricultores();
    }

    private function CargarAgricultores()
    {
        $datos = $this->getAgricultores();
        foreach ($datos as $agricultor) {
            $this->CargaAgricultor($agricultor);
        }
    }
    /**
     * Añade un nuevo agricultor a la colección 
     *
     * @param Agricultor $nuevoAgricultor
     * @return void
     */
    public function addAgricultor(Agricultor $nuevoAgricultor)
    {
        $nuevoAgricultor->setEstado(Estado_Enum::NUEVO);
        $this->agricultores[$nuevoAgricultor->getDni()] = $nuevoAgricultor;
    }
    public function CargaAgricultor(Agricultor $nuevoAgricultor)
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
        //unset($this->agricultores[$borradoAgricultor->getDNI()]);
        $borradoAgricultor->setEstado(Estado_Enum::BORRADO);
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
            $modificaAgricultor->setEstado(Estado_Enum::MODIFICADO);
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

    public function recuperarDatos()
    { }

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

    public function getAgricultores()
    {
        $bd = new GBD("127.0.0.1", "agricultor", "root", "");
        $agricultores = $bd->getAll("agricultor");
        return $agricultores;
    }

    public function GrabarAgricultores()
    {
        $bd = new GBD("localhost", "agricultor", "root", "");
        foreach ($this->agricultores as $dni => $agricultor) {
            switch ($agricultor->getEstado()) {
                case Estado_Enum::MODIFICADO:
                    $bd->update("agricultor", get_object_vars($agricultor), [$agricultor->getDni()]);
                    $agricultor->setEstado(Estado_Enum::SIN_CAMBIOS);
                    break;
                case Estado_Enum::BORRADO:
                    $bd->delete("agricultor", [$agricultor->getDni()]);
                    unset($this->agricultores[$agricultor->dni]);
                    break;
                case Estado_Enum::NUEVO:
                    $bd->add("agricultor", [
                        "dni" => $agricultor->dni, "nombre" => $agricultor->nombre,
                        "apellidos" => $agricultor->apellidos, "email" => $agricultor->email
                    ]);
                    $agricultor->setEstado(Estado_Enum::SIN_CAMBIOS);
                    break;
            }
        }
    }
}
