<?php
class GBD
{
    private $conexion;

    /**
     * Constructor donde se crea la conexión
     *
     * @param string $host url del servidor
     * @param string $basedatos nombre de la base de datos
     * @param string $usuario
     * @param string $password
     * @param string $driver driver para el servidor de base de datos
     */
    public function __construct(
        string $host,
        string $basedatos,
        string $usuario,
        string $password,
        string $driver = "mysql"
    ) {
        //Dependiendo del valor de driver construir dsn adecuado
        switch ($driver) {
            case 'mysql':
                $dsn = $driver . ":dbname=" . $basedatos . ";host=" . $host;
                break;
            case 'sqlsrv':
                $dsn = $driver . ":Database=" . $basedatos . ";server=" . $host;
                break;
            default:
                # code...
                break;
        }
        $dsn = $driver . ":dbname=" . $basedatos . ";host=" . $host;
        try {
            $this->conexion = new PDO($dsn, $usuario, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            throw new PDOException("Error en la conexión: " . $e->getMessage());
        }
    }

    /**
     * Lee todos los registros de una tabla pudiendo seleccionar los campos
     *
     * @param string $tabla nombre de la tabla
     * @param array $campos campos a leer o null para todos
     * @return array de objetos con los datos
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
            throw new PDOException("Error de lectura de datos: " . $e->getMessage());
        }
    }


    public function findById(string $tabla, $valor)
    {
        $sql = "select * from " . $tabla . " where " . $this->getPrimaryKey($tabla) . " = ?";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(1, $valor);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_CLASS, $tabla);
            return $datos;
        } catch (PDOException $e) {
            throw new PDOException("Error leyendo por clave primaria: " . $e->getMessage());
        }
    }

    public function findByOne(string $tabla, $campovalor)
    {
        $sql = "select * from " . $tabla . " where " . array_keys($campovalor)[0] . " = ?";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(1, array_values($campovalor)[0]);
            $consulta->execute();
            $datos = $consulta->fetchAll(PDO::FETCH_CLASS, $tabla);
            return $datos;
        } catch (PDOException $e) {
            throw new PDOException("Error leyendo por clave primaria: " . $e->getMessage());
        }
    }

    /**
     * Inserta una fila en una tabla
     *
     * @param string $tabla nombre de la tabla
     * @param array $valores array asociativo <campo>=><valor>
     * @return void
     */
    public function add(string $tabla, array $valores)
    {
        $campos = implode(",", array_keys($valores));
        $parametros = str_repeat("?,", count($valores));
        $parametros = rtrim($parametros, ",");
        $sql = "insert into " . $tabla . " (" . $campos . ") values (" . $parametros . ")";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute(array_values($valores));
        } catch (PDOException $e) {
            throw new PDOException("Error insertando registro: " . $e->getMessage());
        }
    }

    /**
     * Modifica una fila
     *
     * @param string $tabla nomnre de la tabla
     * @param array $camposvalores array asociativo <campo>=><valor>
     * @param [type] $valorid valor de la clave primaria
     * @return void
     */
    public function update(string $tabla, array $camposvalores, $valorid)
    {
        $sql = "update $tabla set ";
        $campos = implode("=?, ", array_keys($camposvalores));
        $campos .= "=?";
        $sql .= $campos;
        $clave = $this->getPrimaryKey($tabla);
        $sql .= " where $clave = ?";
        try {
            $consulta = $this->conexion->prepare($sql);
            $valores = array_values($camposvalores);
            $valores[] = $valorid;
            $consulta->execute($valores);
        } catch (PDOException $e) {
            throw new PDOException("Error modificando fila: " . $e->getMessage());
        }
    }

    /**
     * Borra una fila de la tabla por clave primaria
     *
     * @param string $tabla nombre de la tabla
     * @param [type] $valorid valor de la clave primaria
     * @return void
     */
    public function delete(string $tabla, $valorid)
    {
        $sql = "delete from $tabla where " . $this->getPrimaryKey($tabla) . "=?";
        try {
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute($valorid);
        } catch (PDOException $e) {
            throw new PDOException("Error borrando fila:" . $e->getMessage());
        }
    }

    /**
     * Devuelve el campo que es clave primaria
     *
     * @param [string] $tabla nombre de la tabla
     * @return string el nombre del campo
     */
    private function getPrimaryKey(string $tabla)
    {
        $sql = "SHOW KEYS FROM $tabla WHERE Key_name = 'PRIMARY'";
        $consulta = $this->conexion->query($sql);
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $datos[0]["Column_name"];
    }

    /**
     * Devuelve la conexión
     *
     * @return void
     */
    public function getConexion()
    {
        return $this->conexion;
    }
}

function creaClases(string $nombreBD)
{
    $dsn = "mysql:dbname=$nombreBD;host=127.0.0.1";
    $usuario = "root";
    $passwd = "";

    try {
        $conexion = new PDO($dsn, $usuario, $passwd);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = $conexion->query("select TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
        WHERE table_schema = '$nombreBD'");
        //Por defecto datos se devuelven indexados y asociativos
        $tablas = $consulta->fetchAll(PDO::FETCH_ASSOC);
        var_dump($tablas);
        foreach ($tablas as $tabla) {
            $clase = implode($tabla);
            $consulta = $conexion->query("SHOW COLUMNS FROM $nombreBD.$clase");
            $columnas = $consulta->fetchAll(PDO::FETCH_ASSOC);
            if (!file_exists("./Clases/$clase.php")) {
                $fh = fopen("./Clases/$clase.php", 'w') or die("Se produjo un error al crear el archivo");
                fwrite($fh, "<?php \n") or die("No se pudo escribir en el archivo");
                foreach ($columnas as $propiedad) {
                    $nombre = $propiedad['Field'];
                    $texto = "$" . $nombre . ";\n";
                    fwrite($fh, $texto) or die("No se pudo escribir en el archivo");
                }
                fclose($fh);
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


//Código para pruebas y luego borrar
class Categories
{
    public $CategoryID;
    public $CategoryName;
}



$bd = new GBD("127.0.0.1", "northwind", "root", "higuera2@");
$bd->update("categories", ["CategoryName" => "Nueva", "Description" => "Nueva descripción"], 4);