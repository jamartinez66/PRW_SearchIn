<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/editarMarcadores.css">
    <title>Search-In: Control de Marcadores</title>
</head>
<body>

    <?php
        
        // Iniciamos la sesión para poder guardar datos de sesión
        session_start();
        // Requerimos los componentes de conexion y metodos para poder manejar los datos de entrada y salida hacia nuestra BD
        require_once "./conexion.php";
        require_once "./metodos.php";

        // Si no se ha enviado el formulario para actualizar ningún dato, cargamos la rama por defecto de nuestro código
        if(isset($_SESSION['hecho'])){
            if($_SESSION['hecho'] == "no"){

                if(isset($_SESSION['tipo'])){ // Comprobamos que el usuario que esta accediendo es el administrador
                    if($_SESSION['tipo'] == "Administrador"){
                        
                        // Cargaremos la opción de editar los marcadores
                        if($_GET['metodo'] == "editar"){

                            // Recuperamos el nombre del usuario y sus marcadores
                            $nombre = $_GET['nombre'];


                            // Los asignamos a variables 
                            $objeto = new metodos();
                            $sql = "SELECT * FROM marcadores WHERE usuario = '$nombre'";
                            $datos = $objeto->mostrarDatos($sql);
                            foreach ($datos as $clave) {
                                $marcador1nombre = $clave['marcador1nombre'];
                                $marcador1url = $clave['marcador1url'];
                                $marcador2nombre = $clave['marcador2nombre'];
                                $marcador2url = $clave['marcador2url'];
                                $marcador3nombre = $clave['marcador3nombre'];
                                $marcador3url = $clave['marcador3url'];
                                $marcador4nombre = $clave['marcador4nombre'];
                                $marcador4url = $clave['marcador4url'];
                                $marcador5nombre = $clave['marcador5nombre'];
                                $marcador5url = $clave['marcador5url'];
                            }
                            $objeto = new metodos();
                            $sql = "SELECT * FROM usuario WHERE nombre='$nombre'";
                            $datos = $objeto->mostrarDatos($sql);
                            foreach ($datos as $clave){
                                $id = $clave['id'];
                            }
                        ?>  <!-- Definimos la interfaz y implementamos un formulario para mostrar posteriormente los datos -->
                        <form action="" method="POST">
                            <div id="contenido">
                                <div id="principal" style="width: 25%">
                                    <p style="color:dimgray; text-decoration: underline; margin-bottom: 2rem; text-align: center; font-size: 1rem">Editar Marcadores</p>
                                    <div id="campos">
                                        <div id="textos">
                                            <p style="margin-bottom: 2rem">Marcador 1:</p>
                                            <p style="margin-bottom: 2rem">Marcador 2:</p>
                                            <p style="margin-bottom: 2rem">Marcador 3:</p>
                                            <p style="margin-bottom: 2rem">Marcador 4:</p>
                                            <p style="margin-bottom: 2rem">Marcador 5:</p>
                                        </div>
                                        <!-- Mostramos los datos asociados a la id que obtuvimos -->
                                        <div id="inputs">
                                            <input type="text" name="marcador1nombre" class="inputTexto" value="<?php echo $marcador1nombre ?>">
                                            <input type="text" name="marcador1url" class="inputTexto" value="<?php echo $marcador1url ?>">
                                            <input type="text" name="marcador2nombre" class="inputTexto" value="<?php echo $marcador2nombre ?>">
                                            <input type="text" name="marcador2url" class="inputTexto" value="<?php echo $marcador2url ?>">
                                            <input type="text" name="marcador3nombre" class="inputTexto" value="<?php echo $marcador3nombre ?>">
                                            <input type="text" name="marcador3url" class="inputTexto" value="<?php echo $marcador3url ?>">
                                            <input type="text" name="marcador4nombre" class="inputTexto" value="<?php echo $marcador4nombre ?>">
                                            <input type="text" name="marcador4url" class="inputTexto" value="<?php echo $marcador4url ?>">
                                            <input type="text" name="marcador5nombre" class="inputTexto" value="<?php echo $marcador5nombre ?>">
                                            <input type="text" name="marcador5url" class="inputTexto" value="<?php echo $marcador5url ?>">
                                        </div>
                                    </div>
                                    <a href="./editarUsuario.php?id=<?php echo $id; ?>&metodo=editar" id="botonEnviar" style="width: 40%; margin-top: 1.25rem">Editar sus datos</a> 
                                    <input type=submit name="actualizar" value="Actualizar" id="botonEnviar" style="width: 73%; margin-top: 3rem; margin-bottom: 0.5rem"> 

                                    <?php // Si enviamos el formulario, la aplicación obtendrá los nuevos resultados editados en cada campo
                                    if(isset($_POST['actualizar'])){

                                        $marcador1nombre = $_POST['marcador1nombre'];
                                        $marcador1url = $_POST['marcador1url'];

                                        $marcador2nombre = $_POST['marcador2nombre'];
                                        $marcador2url = $_POST['marcador2url'];

                                        $marcador3nombre = $_POST['marcador3nombre'];
                                        $marcador3url = $_POST['marcador3url'];

                                        $marcador4nombre = $_POST['marcador4nombre'];
                                        $marcador4url = $_POST['marcador4url'];

                                        $marcador5nombre = $_POST['marcador5nombre'];
                                        $marcador5url = $_POST['marcador5url'];
                                        
                                        // Los nuevos datos son guardados en la BD
                                        $_SESSION['hecho'] = "si";
                                        $objeto = new metodos();
                                        $objeto->actualizarMarcadores($marcador1nombre,$marcador1url,$marcador2nombre,$marcador2url, $marcador3nombre,$marcador3url,$marcador4nombre,$marcador4url,$marcador5nombre,$marcador5url,$nombre);
                                        header("refresh: 0;");
                                    }
                                    ?> <!-- Botones de navegación -->
                                    <div id="botones">
                                        <a href="./formUsuarios.php" id="botonEnviar" style="width: 20%;">Volver</a> 
                                        <a href="./index.php" id="botonEnviar" style="width: 20%">Inicio</a> 
                                    </div>

                                </div>
                            </div>
                        </form>

                        <?php // Cargaremos la opción de borrar los marcadores
                        }else if($_GET['metodo'] == "borrar"){ 

                            // Recuperamos el nombre del usuario y sus marcadores
                            $nombre = $_GET['nombre'];


                            // Los asignamos a variables 
                            $objeto = new metodos();
                            $sql = "SELECT * FROM marcadores WHERE usuario = '$nombre'";
                            $datos = $objeto->mostrarDatos($sql);
                            foreach ($datos as $clave) {
                                $marcador1nombre = $clave['marcador1nombre'];
                                $marcador1url = $clave['marcador1url'];
                                $marcador2nombre = $clave['marcador2nombre'];
                                $marcador2url = $clave['marcador2url'];
                                $marcador3nombre = $clave['marcador3nombre'];
                                $marcador3url = $clave['marcador3url'];
                                $marcador4nombre = $clave['marcador4nombre'];
                                $marcador4url = $clave['marcador4url'];
                                $marcador5nombre = $clave['marcador5nombre'];
                                $marcador5url = $clave['marcador5url'];
                            }
                            $objeto = new metodos();
                            $sql = "SELECT * FROM usuario WHERE nombre='$nombre'";
                            $datos = $objeto->mostrarDatos($sql);
                            foreach ($datos as $clave){
                                $id = $clave['id'];
                            }

                                ?><!-- Definimos la interfaz y implementamos un formulario para mostrar posteriormente los datos -->
                                <form action="" method="POST">
                                    <div id="contenido">
                                        <div id="principal" style="width: 25%">
                                            <p style="color:dimgray; text-decoration: underline; margin-bottom: 2rem; text-align: center; font-size: 1rem">Resetear Marcadores</p>
                                            <div id="campos">
                                                <div id="textos">
                                                <p style="margin-bottom: 2rem">Marcador 1:</p>
                                                    <p style="margin-bottom: 2rem">Marcador 2:</p>
                                                    <p style="margin-bottom: 2rem">Marcador 3:</p>
                                                    <p style="margin-bottom: 2rem">Marcador 4:</p>
                                                    <p style="margin-bottom: 2rem">Marcador 5:</p>
                                                </div>
                                                <!-- Mostramos los datos asociados a la id que obtuvimos, pero esta vez los campos estarán desactivados para evitar su edición -->
                                                <div id="inputs">
                                                    <input type="text" class="inputTexto" value="<?php echo $marcador1nombre ?>" disabled>
                                                    <input type="text" class="inputTexto" value="<?php echo $marcador1url ?>" disabled>
                                                    <input type="text" class="inputTexto" value="<?php echo $marcador2nombre ?>" disabled>
                                                    <input type="text" class="inputTexto" value="<?php echo $marcador2url ?>" disabled>
                                                    <input type="text" class="inputTexto" value="<?php echo $marcador3nombre ?>" disabled>
                                                    <input type="text" class="inputTexto" value="<?php echo $marcador3url ?>" disabled>
                                                    <input type="text" class="inputTexto" value="<?php echo $marcador4nombre ?>" disabled>
                                                    <input type="text" class="inputTexto" value="<?php echo $marcador4url ?>" disabled>
                                                    <input type="text" class="inputTexto" value="<?php echo $marcador5nombre ?>" disabled>
                                                    <input type="text" class="inputTexto" value="<?php echo $marcador5url ?>" disabled>
                                                </div>
                                            </div>

                                            <input type=submit name="resetear" value="Resetear" id="botonEnviar" style="width: 73%; margin-top: 3rem; margin-bottom: 0.5rem"> 
                                            
                                            <?php
                                            // Si enviamos el formulario, la aplicación reseteará los datos asociados a cada campo
                                            if(isset($_POST['resetear'])){
                                                $_SESSION['hecho'] = "si";
                                                $objeto = new metodos();
                                                $objeto->actualizarMarcadores("Favorito","URL","Favorito","URL","Favorito","URL","Favorito","URL","Favorito","URL",$nombre);
                                                header("refresh: 0;");
                                            } // Al enviar los datos, cambiamos el valor de la variable de session "hecho", lo que nos lleva a la segunda rama de código del componente
                                              // que nos servirá de mensaje de confirmación, y nos redirijirá a la página de Inicio
                                            ?>
                                            
                                            <div id="botones"><!-- Botones de navegación -->
                                                <a href="./formUsuarios.php" id="botonEnviar" style="width: 20%;">Volver</a> 
                                                <a href="./index.php" id="botonEnviar" style="width: 20%">Inicio</a> 
                                            </div>

                                        </div>
                                    </div>
                                </form>

                        <?php
                        }
                    }
                }// Si ya se ha enviado el formulario de la rama de código anterior, se ejecutará un mensaje de confirmación y regresaremos a Inicio
            }else if($_SESSION['hecho'] == "si"){
                ?>
                <div id="contenido">
                    <div id="mensaje">
                        <span>La operación se ha efectuado. Redirigiendo </span>
                        <img src='./imgs/loading.svg' style='width: 1.8rem;'></img>
                    </div>
                </div>
                <?php
                header("refresh: 2; url= ./formUsuarios.php");
            }
        }
    ?>


</body>
</html>