<?php
class Parcela
{
    private $id_parcela;
    private $nombre;
    private $num_parcela;
    private $num_poligono;
    private $Num_Olivos;

    //Constructor
    public function __construct(string $id_parcela, string $nombre, string $num_parcela, string $num_poligono, string $Num_Olivos)
    {
        $this->id_parcela = $id_parcela;
        $this->nombre = $nombre;
        $this->num_parcela = $num_parcela;
        $this->num_poligono = $num_poligono;
        $this->Num_Olivos = $Num_Olivos;
    }
}
