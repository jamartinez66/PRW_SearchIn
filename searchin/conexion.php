<?php
    // Clase que permitirá establecer la conexión con la base de datos.
    class Conectar{
        private $servidor = "localhost";
        private $usuario = "root";
        private $bd = "searchin";
        private $password = "Aa123456";

        public function conexion(){
            $conexion = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->bd);

            return $conexion;
        }
    }
    
?>
