<?php
class Sagricultor
{
    private $nombre;
    private $cif;

    //Propiedad que viene de la relación entre La empresa y Agricultor
    private $agricultores = [];
    private $maquinas = [];
    private $parcelas = [];
    private $actividades = [];
    private $noticias = [];
    //Constructor
    public function __construct(string $nombre, string $cif)
    {
        $this->nombre = $nombre;
        $this->cif = $cif;
        $this->CargarAgricultores();
        $this->getParcelas();
        $this->getActividades();
        $this->getMaquinas();
        $this->getNoticias();
    }


    //Agricultores


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

    //Maquinas


    public function getMaquinas()
    {
        $bd = new GBD("127.0.0.1", "agricultor", "root", "");
        $maquinas = $bd->getAll("maquina");
        foreach ($maquinas as $maquina) {
            $this->añadirmaquina($maquina);
        }
    }


    public function alquilaMaquina(Maquina $alquilaMaquina)
    {
        $alquilaMaquina->setAlquilada(true);
    }

    public function findMaquinaById(string $Codigo)
    {
        return $this->maquinas[$Codigo];
    }

    public function añadirMaquina(Maquina $nuevaMaquina)
    {
        $this->maquinas[$nuevaMaquina->getCodigo()] = $nuevaMaquina;
    }

    public function addMaquina(Maquina $nuevaMaquina)
    {
        $nuevaMaquina->setEstado(Estado_Enum::NUEVO);
        $this->maquinas[$nuevaMaquina->getCodigo()] = $nuevaMaquina;
    }

    public function removeMaquina(Maquina $borradoMaquina)
    {
        //unset($this->maquinas[$borradoMaquina->getCodigo()]);
        $borradoMaquina->setEstado(Estado_Enum::BORRADO);
    }

    public function updateMaquina(Maquina $modificaMaquina)
    {
        if (isset($this->maquinas[$modificaMaquina->getCodigo()])) {
            $modificaMaquina->setEstado(Estado_Enum::MODIFICADO);
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

    public function GrabarMaquinas()
    {
        $bd = new GBD("localhost", "agricultor", "root", "");
        foreach ($this->maquinas as $id => $maquina) {
            switch ($maquina->getEstado()) {
                case Estado_Enum::MODIFICADO:
                    $bd->update("maquina", get_object_vars($maquina), [$maquina->getcodigo()]);
                    $maquina->setEstado(Estado_Enum::SIN_CAMBIOS);
                    break;
                case Estado_Enum::BORRADO:
                    $bd->delete("maquina", [$maquina->getcodigo()]);
                    unset($this->maquinas[$maquina->codigo]);
                    break;
                case Estado_Enum::NUEVO:
                    $bd->add("maquina", [
                        "codigo" => $maquina->codigo, "nombre" => $maquina->nombre,
                        "precio_hora" => $maquina->precio_hora, "alquilada" => $maquina->getAlquilada(),
                        "fecha_compra" => $maquina->fecha_compra, "estado" => $maquina->estado
                    ]);
                    $maquina->setEstado(Estado_Enum::SIN_CAMBIOS);
                    break;
            }
        }
    }


    //==========================================================================//

    //Parcelas

    public function getParcelas()
    {
        $bd = new GBD("127.0.0.1", "agricultor", "root", "");
        $parcelas = $bd->getAll("parcela");
        foreach ($parcelas as $parcela) {
            $this->añadirparcela($parcela);
        }
    }

    public function addparcela(parcela $nuevaparcela)
    {
        $nuevaparcela->setEstado(Estado_Enum::NUEVO);
        $this->parcelas[$nuevaparcela->getId_parcela()] = $nuevaparcela;
    }
    public function añadirparcela(parcela $nuevaparcela)
    {
        $this->parcelas[$nuevaparcela->getId_parcela()] = $nuevaparcela;
    }


    public function allparcelas()
    {
        return $this->parcelas;
    }

    public function removeparcela(parcela $borradoparcela)
    {
        $borradoparcela->setEstado(Estado_Enum::BORRADO);
        // unset($this->parcelas[$borradoparcela->getId_parcela()]);
    }

    public function updateparcela(parcela $modificaparcela)
    {
        if (isset($this->parcelas[$modificaparcela->getId_parcela()])) {
            $modificaparcela->setEstado(Estado_Enum::MODIFICADO);
            $this->parcelas[$modificaparcela->getId_parcela()] = $modificaparcela;
        }
    }


    public function findParcelaById(string $id)
    {
        return $this->parcelas[$id];
    }

    public function GrabarParcelas()
    {
        $bd = new GBD("localhost", "agricultor", "root", "");
        foreach ($this->parcelas as $id => $parcela) {
            switch ($parcela->getEstado()) {
                case Estado_Enum::MODIFICADO:
                    $bd->update("parcela", get_object_vars($parcela), [$parcela->getId_parcela(), $parcela->getAgricultores_dni()]);
                    $parcela->setEstado(Estado_Enum::SIN_CAMBIOS);
                    break;
                case Estado_Enum::BORRADO:
                    $bd->delete("parcela", [$parcela->getId_parcela(), $parcela->getAgricultores_dni()]);
                    unset($this->parcelas[$parcela->id_parcela]);
                    break;
                case Estado_Enum::NUEVO:
                    $bd->add("parcela", [
                        "id_parcela" => $parcela->id_parcela, "nombre" => $parcela->nombre,
                        "num_parcela" => $parcela->num_parcela, "num_poligono" => $parcela->num_poligono,
                        "Num_Olivos" => $parcela->Num_Olivos, "agricultores_dni" => $parcela->agricultores_dni
                    ]);
                    $parcela->setEstado(Estado_Enum::SIN_CAMBIOS);
                    break;
            }
        }
    }

    //==============================================================//
    //Actividades


    public function addActividad(Actividad $nuevaAct)
    {
        $nuevaAct->setEstado(Estado_Enum::NUEVO);
        $this->actividades[$nuevaAct->getId_actividad()] = $nuevaAct;
    }
    public function AñadirActividad(Actividad $nuevaAct)
    {
        $this->actividades[$nuevaAct->getId_actividad()] = $nuevaAct;
    }

    public function getActividades()
    {
        $bd = new GBD("127.0.0.1", "agricultor", "root", "");
        $actividades = $bd->getAll("actividad");
        foreach ($actividades as $actividad) {
            $this->añadirActividad($actividad);
        }
    }


    public function removeActividad(Actividad $borradoactividad)
    {
        //unset($this->Actividades[$borradoactividad->getId_actividad()]);
        $borradoactividad->setEstado(Estado_Enum::BORRADO);
    }


    public function updateActividad(Actividad $modificaactividad)
    {
        if (isset($this->actividades[$modificaactividad->getId_actividad()])) {
            $modificaactividad->setEstado(Estado_Enum::MODIFICADO);
            $this->actividades[$modificaactividad->getId_actividad()] = $modificaactividad;
        }
    }

    public function allActividades()
    {
        return $this->actividades;
    }

    public function findActividadById(string $id)
    {
        return $this->actividades[$id];
    }

    public function GrabarActividades()
    {
        $bd = new GBD("localhost", "agricultor", "root", "");
        foreach ($this->actividades as $id => $actividad) {
            switch ($actividad->getEstado()) {
                case Estado_Enum::MODIFICADO:
                    $bd->update("actividad", get_object_vars($actividad), [$actividad->getId_actividad(), $actividad->getId_parcela()]);
                    $actividad->setEstado(Estado_Enum::SIN_CAMBIOS);
                    break;
                case Estado_Enum::BORRADO:
                    $bd->delete("actividad", [$actividad->getId_actividad(), $actividad->getId_parcela()]);
                    unset($this->actividades[$actividad->id_actividad]);
                    break;
                case Estado_Enum::NUEVO:
                    $bd->add("actividad", [
                        "id_actividad" => $actividad->id_actividad, "titulo" => $actividad->titulo,
                        "tipo" => $actividad->tipo, "descripcion" => $actividad->descripcion,
                        "id_parcela" => $actividad->id_parcela
                    ]);
                    $actividad->setEstado(Estado_Enum::SIN_CAMBIOS);
                    break;
            }
        }
    }



    //=========================================================//

    //Noticias

    public function addNoticia(Noticia $nuevaNoticia)
    {
        $nuevaNoticia->setEstado(Estado_Enum::NUEVO);
        $this->noticias[$nuevaNoticia->getTitulo()] = $nuevaNoticia;
    }

    public function añadirNoticia(Noticia $nuevaNoticia)
    {
        $this->noticias[$nuevaNoticia->getTitulo()] = $nuevaNoticia;
    }

    public function getNoticias()
    {
        $bd = new GBD("127.0.0.1", "agricultor", "root", "");
        $noticias = $bd->getAll("noticia");
        foreach ($noticias as $noticia) {
            $this->añadirNoticia($noticia);
        }
    }


    public function removeNoticia(Noticia $borradoNoticia)
    {
        //unset($this->Actividades[$borradoactividad->getId_actividad()]);
        $borradoNoticia->setEstado(Estado_Enum::BORRADO);
    }


    public function updateNoticia(Noticia $modificaNoticia)
    {
        if (isset($this->noticias[$modificaNoticia->getTitulo()])) {
            $modificaNoticia->setEstado(Estado_Enum::MODIFICADO);
            $this->noticias[$modificaNoticia->getTitulo()] = $modificaNoticia;
        }
    }

    public function allNoticias()
    {
        return $this->noticias;
    }

    public function findNoticiaById(string $titulo)
    {
        return $this->noticias[$titulo];
    }

    public function GrabarNoticias()
    {
        $bd = new GBD("localhost", "agricultor", "root", "");
        foreach ($this->noticias as $id => $noticia) {
            switch ($noticia->getEstado()) {
                case Estado_Enum::MODIFICADO:
                    $bd->update("noticia", get_object_vars($noticia), [$noticia->getTitulo()]);
                    $noticia->setEstado(Estado_Enum::SIN_CAMBIOS);
                    break;
                case Estado_Enum::BORRADO:
                    $bd->delete("noticia", [$noticia->getTitulo()]);
                    unset($this->noticias[$noticia->titulo]);
                    break;
                case Estado_Enum::NUEVO:
                    $bd->add("noticia", [
                        "Titulo" => $noticia->titulo, "contenido" => $noticia->contenido,
                        "imagen" => $noticia->imagen
                    ]);
                    $noticia->setEstado(Estado_Enum::SIN_CAMBIOS);
                    break;
            }
        }
    }
}
