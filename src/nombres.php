<?php
namespace src\nombres;
include "connection.php"; //  incluimos la conexion
use src\connection\Connection;  
//  extendemos la consulta a conexion para usar las funciones 
class Nombres extends Connection
{
    public function Listar()
    {
        $sql = "SELECT * FROM nombres";
        $result = $this->setConexion()->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                //  almacena en array
                $data[] = $row;
            }
            return $data; //    devuelve los datos
            mysqli_free_result($result);
        } else {
            // regresa 0 cuando esta vacia la consulta
            return 0;
        }
        //  cierra conexion
        $this->closeConexion();
    }
}
