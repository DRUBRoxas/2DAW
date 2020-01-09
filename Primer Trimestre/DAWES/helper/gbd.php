<?php
class GBD
{
    private $conexion;



    /**
     * Crear objetos tipo conexion
     *
     * @param string $host 
     * @param string $basededatos
     * @param string $usuario
     * @param string $password
     * @param string $driver
     */
    public function __construct(
        string $host,
        string $basededatos,
        string $usuario,
        string $password,
        string $driver = "mysql"
    ) {
        //Dependiendo del valor de driver, construir dsn adecuado.

        $dsn = $driver . ":dbname=" . $basededatos . ";host=" . $host;

        try {
            $this->conexion = new PDO($dsn, $usuario, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            throw new Exception("Error en la conexion: " . $e->getMessage());
        }
    }


    /**
     * Devuelve todos los datos de una tabla o en su defecto los datos de los campos que elija el usuario
     *
     * @param string $tabla
     * @param array $campos
     * @return array
     */

    public function getAll(string $tabla, array $campos = null)
    {

        $otroscampos = null;
        if (is_null($campos)) {
            $otroscampos = "*";
        } else {
            $otroscampos = implode(",", $campos);
        }
        $sql = "select " . $otroscampos . " from " . $tabla;
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_CLASS, $tabla);
            return $datos;
        } catch (PDOException $e) {
            throw new Exception("Error de lectura de datos" . $e->getMessage());
        }
    }

    public function insertOnBD(string $tabla, $valores)
    {
        $valores = null;
        $campos = null;
        $sql = "show columns from $tabla";
        try {
            $consulta = $this->conexion->prepare($sql);
        } catch (PDOException $e) {
            throw new Exception("Error de lectura de datos" . $e->getMessage());
        }
    }


    public function findById($tabla, $valor)
    {
        $sql = "select * from " . $tabla . " where " . $this->getPrimaryKey($tabla) . " = ?";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(1, $valor);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_CLASS, $tabla);
            return $datos;
        } catch (PDOException $e) {
            throw new Exception("Error leyendo por clave primaria: " . $e->getMessage());
        }
    }

    private function getPrimaryKey($tabla)
    {
        $sql = "SHOW KEYS FROM $tabla WHERE Key_name = 'PRIMARY'";

        try {
            $consulta = $this->conexion->query($sql);
            $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $datos[0]["Column_name"];
        } catch (PDOException $e) { }
    }
}