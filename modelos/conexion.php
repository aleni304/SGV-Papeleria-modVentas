<?php
class Conexion
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "papeleriaelangel";

    public function getConexion()
    {
        return mysqli_connect($this->host, $this->user, $this->password, $this->database);
    }

    public function desConexion()
    {
        mysqli_close($this->getConexion());
    }
}