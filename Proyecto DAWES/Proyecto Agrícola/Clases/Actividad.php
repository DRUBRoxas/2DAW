<?php
class Actividad
{
    public $id_actividad;
    public $titulo;
    public $tipo;
    public $descripcion;
    public $id_parcela;
    public $estado;

    public function __construct(string $id_actividad = '', string $titulo = '', string $tipo = '', string $descripcion = '', string $id_parcela = '')
    {
        $this->id_actividad = empty($id_actividad) ? $this->id_actividad : $id_actividad;
        $this->titulo = empty($titulo) ? $this->titulo : $titulo;
        $this->tipo = empty($tipo) ? $this->tipo : $tipo;
        $this->descripcion = empty($descripcion) ? $this->descripcion : $descripcion;
        $this->id_parcela = empty($id_parcela) ? $this->id_parcela : $id_parcela;
        $this->estado = Estado_Enum::SIN_CAMBIOS;
    }

    /**
     * Get the value of id_actividad
     */
    public function getId_actividad()
    {
        return $this->id_actividad;
    }

    /**
     * Set the value of id_actividad
     *
     * @return  self
     */
    public function setId_actividad($id_actividad)
    {
        $this->id_actividad = $id_actividad;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

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
}
