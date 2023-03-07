<?php   

        require_once './conexion.php';

    class metodos{

        // Mostrar datos (de forma general)
        public function mostrarDatos($sql){
            $c = new Conectar();
            $conexion = $c->conexion();

            $result=mysqli_query($conexion,$sql);
            
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        // Actualizar categoria en la pantalla de inicio
        public function actualizarCategoria($categoria,$usuario){
            $c = new Conectar();
            $conexion =$c->conexion();

            $sql="UPDATE usuario SET categoriaSeleccionada = '$categoria' WHERE nombre = '$usuario'";

            return $result = mysqli_query($conexion,$sql);
        }


        // METODOS DE NOTICIAS

        public function insertarNoticia($titulo,$categoria,$autor,$fecha,$url,$img){
            $c = new Conectar();
            $conexion =$c->conexion();

            $sql="INSERT INTO noticias (titulo,categoria,autor,fecha,url,img) VALUES ('$titulo','$categoria','$autor','$fecha','$url','$img')";

            return $result = mysqli_query($conexion,$sql);
        }

        public function actualizarNoticia($titulo,$categoria,$autor,$fecha,$id){
            $c = new Conectar();
            $conexion =$c->conexion();

            $sql="UPDATE noticias SET titulo = '$titulo', categoria = '$categoria', autor = '$autor', fecha = '$fecha' WHERE idNoticia = '$id'";

            return $result = mysqli_query($conexion,$sql);
        }

        public function borrarNoticia($id){
            $c = new Conectar();
            $conexion =$c->conexion();

            $sql="DELETE FROM noticias WHERE idNoticia = '$id'";

            return $result = mysqli_query($conexion,$sql);
        }


        // METODOS DE USUARIOS

        public function insertarUsuario($nombre,$nombreCompleto,$contrasena,$categoriaSeleccionada,$tipo){
            $c = new Conectar();
            $conexion =$c->conexion();

            $sql="INSERT INTO usuario (nombre,nombreCompleto,contrasena,categoriaSeleccionada,tipo) VALUES('$nombre','$nombreCompleto','$contrasena','$categoriaSeleccionada','$tipo')";

            return $result = mysqli_query($conexion,$sql);
        }

        public function actualizarUsuario($nombre,$nombreCompleto,$contrasena,$categoriaSeleccionada,$tipo,$id){
            $c = new Conectar();
            $conexion =$c->conexion();

            $sql="UPDATE usuario SET nombre = '$nombre', nombreCompleto = '$nombreCompleto', contrasena = '$contrasena', categoriaSeleccionada = '$categoriaSeleccionada', tipo = '$tipo' WHERE id = '$id'";

            return $result = mysqli_query($conexion,$sql);
        }

        public function borrarUsuario($id){
            $c = new Conectar();
            $conexion = $c->conexion();

            $sql = "DELETE FROM usuario WHERE id = '$id'";

            return $result = mysqli_query($conexion,$sql);
        }

        // METODOS DE MARCADORES

        public function insertarMarcadores($usuario,$marcador1nombre,$marcador1url,$marcador2nombre,$marcador2url,$marcador3nombre,$marcador3url,$marcador4nombre,$marcador4url,$marcador5nombre,$marcador5url){
            $c = new Conectar();
            $conexion =$c->conexion();

            $sql="INSERT INTO marcadores (usuario,marcador1nombre,marcador1url,marcador2nombre,marcador2url,marcador3nombre,marcador3url,marcador4nombre,marcador4url,marcador5nombre,marcador5url) VALUES('$usuario','$marcador1nombre','$marcador1url','$marcador2nombre','$marcador2url','$marcador3nombre','$marcador3url','$marcador4nombre','$marcador4url','$marcador5nombre','$marcador5url')";

            return $result = mysqli_query($conexion,$sql);
        }

        public function actualizarMarcadores($marcador1nombre,$marcador1url,$marcador2nombre,$marcador2url,$marcador3nombre,$marcador3url,$marcador4nombre,$marcador4url,$marcador5nombre,$marcador5url,$usuario){
            $c = new Conectar();
            $conexion =$c->conexion();

            $sql="UPDATE marcadores SET marcador1nombre = '$marcador1nombre', marcador1url = '$marcador1url', marcador2nombre = '$marcador2nombre',  marcador2url = '$marcador2url', marcador3nombre = '$marcador3nombre',  marcador3url = '$marcador3url', marcador4nombre = '$marcador4nombre',  marcador4url = '$marcador4url', marcador5nombre = '$marcador5nombre',  marcador5url = '$marcador5url' WHERE usuario = '$usuario'";

            return $result = mysqli_query($conexion,$sql);
        }

        public function borrarMarcadores($usuario){
            $c = new Conectar();
            $conexion =$c->conexion();

            $sql="DELETE FROM marcadores WHERE usuario = '$usuario'";

            return $result = mysqli_query($conexion,$sql);
        }

    }
?>