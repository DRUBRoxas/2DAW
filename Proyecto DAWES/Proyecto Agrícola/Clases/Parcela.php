<?php
class Parcela
{
    private $id_parcela;
    private $nombre;
    private $num_parcela;
    private $num_poligono;
    private $Num_Olivos;

    private $Actividades;
    //Constructor
    public function __construct(string $id_parcela, string $nombre, string $num_parcela, string $num_poligono, string $Num_Olivos)
    {
        $this->id_parcela = $id_parcela;
        $this->nombre = $nombre;
        $this->num_parcela = $num_parcela;
        $this->num_poligono = $num_poligono;
        $this->Num_Olivos = $Num_Olivos;
    }


    /**
     * Get the value of id_parcela
     */
    public function getId_parcela()
    {
        return $this->id_parcela;
    }

    /**
     * Set the value of id_parcela
     *
     * @return  self
     */
    public function setId_parcela($id_parcela)
    {
        $this->id_parcela = $id_parcela;

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
     * Get the value of num_parcela
     */
    public function getNum_parcela()
    {
        return $this->num_parcela;
    }

    /**
     * Set the value of num_parcela
     *
     * @return  self
     */
    public function setNum_parcela($num_parcela)
    {
        $this->num_parcela = $num_parcela;

        return $this;
    }

    /**
     * Get the value of num_poligono
     */
    public function getNum_poligono()
    {
        return $this->num_poligono;
    }

    /**
     * Set the value of num_poligono
     *
     * @return  self
     */
    public function setNum_poligono($num_poligono)
    {
        $this->num_poligono = $num_poligono;

        return $this;
    }

    /**
     * Get the value of Num_Olivos
     */
    public function getNum_Olivos()
    {
        return $this->Num_Olivos;
    }

    /**
     * Set the value of Num_Olivos
     *
     * @return  self
     */
    public function setNum_Olivos($Num_Olivos)
    {
        $this->Num_Olivos = $Num_Olivos;

        return $this;
    }

    public function addActividad(Actividad $nuevaAct)
    {
        $this->Actividades[$nuevaAct->getId_actividad()] = $nuevaAct;
    }

    public function AllActividades()
    {
        return $this->Actividades;
    }


    public function removeActividad(Actividad $borradoactividad)
    {
        unset($this->Actividades[$borradoactividad->getId_actividad()]);
    }


    public function updateActividad(Actividad $modificaactividad)
    {
        if (isset($this->Actividades[$modificaactividad->getId_actividad()])) {
            $this->Actividades[$modificaactividad->getId_actividad()] = $modificaactividad;
        }
    }

    public function findActividadById(string $id)
    {
        return $this->Actividades[$id];
    }
}
