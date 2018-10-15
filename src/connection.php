<?php
//  declaramos el nombre de espacio para esta clase connection
namespace src\connection;
//  al usar namespace es necesario usar el de mysli o pdo, en este caso usare mysqli
use mysqli;

//  constantes para la conexion
define('dbServer', 'localhost'); //  nombre del host donde esta la bd
define('dbName', 'to_pdf'); //  nombre de la bd
define('dbUser', 'root');   //  usuario
define('dbPass', '');   // contraseña
//  declaramos clase connection
class Connection {
    protected $conexion;
    public function getServer()
    {
        # servidor ex. localhost
        return constant("dbServer");
    }
    public function getDB()
    {
        # nombre de base de datos
        return constant("dbName");
    }
    public function getUser()
    {
        # nombre de usuario de la base de datos
        return constant("dbUser");
    }
    public function getPass()
    {
        # contraseña de usuario de base de datos
        return constant("dbPass");
    }
    public function setConexion()
    {
        //  conexion a bd
        $this->conexion = new Mysqli($this->getServer(), $this->getUser(), $this->getPass(), $this->getDB());
        if (!$this->conexion = new Mysqli($this->getServer(), $this->getUser(), $this->getPass(), $this->getDB())) {
            die('error revise estado de servidor');
        }
        //  devolvemos la conexion
        return $this->conexion;
    }

    public function closeConexion()
    {
        //  cierra conexion
        return $this->setConexion()->close();
    }
}