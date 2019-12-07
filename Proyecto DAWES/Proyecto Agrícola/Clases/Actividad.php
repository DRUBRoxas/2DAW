<?php
class Actividad
{
    private $id_actividad;
    private $titulo;
    private $tipo;
    private $descripcion;

    public function __construct(string $id_actividad, string $titulo, string $tipo, string $descripcion)
    {
        $this->id_actividad = $id_actividad;
        $this->titulo = $titulo;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
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
}
