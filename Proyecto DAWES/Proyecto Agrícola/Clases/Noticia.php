<?php
class Noticia
{
    private $titulo;
    private $desarrollo;
    private $imagen;

    public function __construct(string $titulo = '', string $desarrollo = '', string $imagen = '')
    {
        $this->titulo = empty($titulo) ? $this->titulo : $titulo;
        $this->desarrollo = empty($desarrollo) ? $this->desarrollo : $desarrollo;
        $this->imagen = empty($imagen) ? $this->imagen : $imagen;
    }

    /**
     * Get the value of Titulo
     */
    public function getTitulo()
    {
        return $this->Titulo;
    }

    /**
     * Set the value of Titulo
     *
     * @return  self
     */
    public function setTitulo($Titulo)
    {
        $this->Titulo = $Titulo;

        return $this;
    }

    /**
     * Get the value of Desarrollo
     */
    public function getDesarrollo()
    {
        return $this->Desarrollo;
    }

    /**
     * Set the value of Desarrollo
     *
     * @return  self
     */
    public function setDesarrollo($Desarrollo)
    {
        $this->Desarrollo = $Desarrollo;

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
}
