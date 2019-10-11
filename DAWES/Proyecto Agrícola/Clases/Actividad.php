<?php
class Actividades
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
}
