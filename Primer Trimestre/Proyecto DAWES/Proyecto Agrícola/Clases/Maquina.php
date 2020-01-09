<?php

class Maquina
{
    public $codigo;
    public $nombre;
    public $precio_hora;
    public $alquilada;
    public $fecha_compra;
    public $estado;


    public function __construct(string $codigo = '', string $nombre = '', string $precio_hora = '', bool $alquilada = false, string $fecha_compra = '')
    {
        $this->codigo = empty($codigo) ? $this->codigo : $codigo;
        $this->nombre = empty($nombre) ? $this->nombre : $nombre;
        $this->precio_hora = empty($precio_hora) ? $this->precio_hora : $precio_hora;
        $this->alquilada = empty($alquilada) ? $this->alquilada : $alquilada;
        $this->fecha_compra = empty($fecha_compra) ? $this->fecha_compra : $fecha_compra;
    }

    /**
     * Get the value of codigo
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

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
     * Get the value of precio_hora
     */
    public function getPrecio_hora()
    {
        return $this->precio_hora;
    }

    /**
     * Set the value of precio_hora
     *
     * @return  self
     */
    public function setPrecio_hora($precio_hora)
    {
        $this->precio_hora = $precio_hora;

        return $this;
    }

    /**
     * Get the value of alquilada
     */
    public function getalquilada()
    {
        if ($this->alquilada == false) {
            return "Disponible";
        } else {
            return "Alquilado";
        }
    }

    /**
     * Set the value of alquilada
     *
     * @return  self
     */
    public function setalquilada($alquilada)
    {
        $this->alquilada = $alquilada;

        return $this;
    }

    /**
     * Get the value of fecha_compra
     */
    public function getFecha_compra()
    {
        return $this->fecha_compra;
    }

    /**
     * Set the value of fecha_compra
     *
     * @return  self
     */
    public function setFecha_compra($fecha_compra)
    {
        $this->fecha_compra = $fecha_compra;

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
