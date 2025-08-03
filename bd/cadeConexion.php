<?php
class Database
{
    // private $host = "localhost";
    // private $username = "u217817257_AdmWoods";
    // private $password = "2|Ffk6QU#*";
    // private $dbname = "u217817257_BDSystemWoods";
    // //private $port = 3306;
    // private $connection;
    private $host = "127.0.0.1";
    private $username = "root";
    private $password = "";
    private $dbname = "systemwoods";
    private $port = 3306;
    private $connection;
    public function connect()
    {
        if (!$this->connection) {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);

            if ($this->connection->connect_error) {
                die("Error al conectar a la base de datos: " . $this->connection->connect_error);
            }
        }
        return $this->connection;
    }

    public function disconnect()
    {
        if ($this->connection) {
            $this->connection->close();
            $this->connection = null;
        }
    }

    public function getConexion()
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        mysqli_set_charset($conn, "utf8");
        return $conn;
    }
}
