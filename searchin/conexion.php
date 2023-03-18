<?php
    // Clase que permitirá establecer la conexión con la base de datos.
    class Conectar{
        private $servidor = "localhost:3306";
        private $usuario = "root";
        private $bd = "searchin";
        private $password = "Aa123456";

        public function conexion(){
            $conexion = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->bd);
            // Verificar si la conexión fue exitosa
            if ($conexion->connect_error) {
                // Si no se pudo conectar, imprimir el mensaje de error
                die("Conexión fallida: " . $conexion->connect_error);
            }

            return $conexion;
        }
    }
    
?>
