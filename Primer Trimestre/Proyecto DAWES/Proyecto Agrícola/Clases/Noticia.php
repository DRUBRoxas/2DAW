<?php
class Noticia
{
    public $titulo;
    public $contenido;
    public $imagen;
    public $estado;

    public function __construct(string $titulo = '', string $contenido = '', string $imagen = '')
    {
        $this->titulo = empty($titulo) ? $this->titulo : $titulo;
        $this->contenido = empty($contenido) ? $this->contenido : $contenido;
        $this->imagen = empty($imagen) ? $this->imagen : $imagen;
        $estado = Estado_Enum::SIN_CAMBIOS;
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
     * Get the value of contenido
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set the value of contenido
     *
     * @return  self
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

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
}
