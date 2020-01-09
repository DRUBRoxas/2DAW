<?php
class Parcela
{
    public $id_parcela;
    public $nombre;
    public $num_parcela;
    public $num_poligono;
    public $Num_Olivos;
    public $agricultores_dni;
    public $estado;

    //Constructor
    public function __construct(string $id_parcela = '', string $nombre = '', string $num_parcela = '', string $num_poligono = '', string $Num_Olivos = '', string $agricultores_dni = '')
    {
        $this->id_parcela = empty($id_parcela) ? $this->id_parcela : $id_parcela;
        $this->nombre = empty($nombre) ? $this->nombre : $nombre;
        $this->num_parcela = empty($num_parcela) ? $this->num_parcela : $num_parcela;
        $this->num_poligono = empty($num_poligono) ? $this->num_poligono : $num_poligono;
        $this->Num_Olivos = empty($Num_Olivos) ? $this->Num_Olivos : $Num_Olivos;
        $this->agricultores_dni = empty($agricultores_dni) ? $this->agricultores_dni : $agricultores_dni;
        $this->estado = Estado_Enum::SIN_CAMBIOS;
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

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of agricultores_dni
     */
    public function getAgricultores_dni()
    {
        return $this->agricultores_dni;
    }

    /**
     * Set the value of agricultores_dni
     *
     * @return  self
     */
    public function setAgricultores_dni($agricultores_dni)
    {
        $this->agricultores_dni = $agricultores_dni;

        return $this;
    }
}
