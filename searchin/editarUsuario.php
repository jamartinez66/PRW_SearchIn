<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/editarUsuario.css">
    <title>Search-In: Control de Usuario</title>
</head>
<body>

    <?php
    // Iniciamos la sesión para poder guardar datos de sesión
        session_start();
        // Requerimos los componentes de conexion y metodos para poder manejar los datos de entrada y salida hacia nuestra BD
        require_once "./conexion.php";
        require_once "./metodos.php";
        error_reporting(0);

        // Si no se ha enviado el formulario para actualizar ningún dato, cargamos la rama por defecto de nuestro código
        if(isset($_SESSION['hecho'])){
            if($_SESSION['hecho'] == "no"){

                // Comprobamos que el usuario que esta accediendo es el administrador
                if(isset($_SESSION['tipo'])){
                    if($_SESSION['tipo'] == "Administrador"){

                        // Cargaremos la opción de editar los usuarios
                        if($_GET['metodo'] == "editar"){

                            $id = $_GET['id'];

                            // Recuperamos los datos asociados a la ID que obtenemos por url
                            $objeto = new metodos();
                            $sql = "SELECT * FROM usuario WHERE id = '$id'";
                            $datos = $objeto->mostrarDatos($sql);

                            // Los asignamos a variables 
                            foreach ($datos as $clave) {
                                $nombre = $clave['nombre'];
                                $nombreCompleto = $clave['nombreCompleto'];
                                $contrasena = $clave['contrasena'];
                                $categoria = $clave['categoriaSeleccionada'];
                                $tipo = $clave['tipo'];
                            }   

                            
                            ?>  <!-- Definimos la interfaz e implementamos un formulario para mostrar posteriormente los datos -->
                                <form action="" style="margin:0 auto;" method="POST">
                                    <div id="contenido">
                                        <div id="principal" style="width: 25%">
                                            <p style="color:dimgray; text-decoration: underline; margin-bottom: 2rem; text-align: center; font-size: 1rem">Editar información de usuario</p>
                                            <div id="campos">
                                                <div id="textos">
                                                    <p>ID:</p>
                                                    <p>Nombre:</p>
                                                    <p>Nombre Completo:</p>
                                                    <p>Contraseña:</p>
                                                    <p>Categoria Seleccionada:</p>
                                                    <p>Tipo de Usuario:</p>
                                                </div>
                                                <!-- Mostramos los datos asociados a la id que obtuvimos -->
                                                <div id="inputs">
                                                    <input type="text" name="id" class="inputTexto" value="<?php echo $id; ?>" disabled>
                                                    <input type="text" name="nombre" class="inputTexto" value="<?php echo $nombre; ?>">
                                                    <input type="text" name="nombreCompleto" class="inputTexto" value="<?php echo $nombreCompleto; ?>">
                                                    <input type="text" name="contrasena" class="inputTexto" value="<?php echo $contrasena; ?>">
                                                    <select name="categoria" id="inputTexto">
                                                        <option value="Todo" <?php if($categoria == "Todo"){ echo "selected";} ?>>Todo</option>
                                                        <option value="Nacional" <?php if($categoria == "Nacional"){ echo "selected";} ?>>Nacional</option>
                                                        <option value="Internacional" <?php if($categoria == "Internacional"){ echo "selected";} ?>>Internacional</option>
                                                        <option value="Economia" <?php if($categoria == "Economia"){ echo "selected";} ?>>Economia</option>
                                                        <option value="Deportes" <?php if($categoria == "Deportes"){ echo "selected";} ?>>Deportes</option>
                                                        <option value="Opinion" <?php if($categoria == "Opinion"){ echo "selected";} ?>>Opinión</option>
                                                    </select>
                                                    <select name="tipo" id="inputTexto">
                                                        <option value="Administrador" <?php if($tipo == "Administrador"){ echo "selected";} ?>>Administrador</option>
                                                        <option value="Redactor" <?php if($tipo == "Redactor"){ echo "selected";} ?>>Redactor</option>
                                                        <option value="Lector" <?php if($tipo == "Lector"){ echo "selected";} ?>>Lector</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Acceso directo para acceder a la seccion que permite editar los marcadores del usuario -->    
                                            <a href="./editarMarcadores.php?nombre=<?php echo $nombre; ?>&metodo=editar" id="botonEnviar" style="width: 40%; margin-top: 1rem">Editar sus Marcadores</a> 
    
                                            <!-- Botones de navegación y de envío del formulario --> 
                                            <input type="submit" name="actualizar" value="Actualizar" id="botonEnviar" style="width: 73%; margin-top: 3rem; margin-bottom: 0.5rem"> 
                                            <div id="botones">
                                                <a href="./formUsuarios.php" id="botonEnviar" style="width: 20%;">Volver</a> 
                                                <a href="./index.php" id="botonEnviar" style="width: 20%">Inicio</a> 
                                            </div>
                                            <!-- Si enviamos el formulario, la aplicación obtendrá los nuevos resultados editados en cada campo y los actualizará en la BD --> 
                                            <?php
                                            if(isset($_POST['actualizar'])){
                                            
                                                $nombreNuevo = $_POST['nombre'];
                                                $nombreCompletoNuevo = $_POST['nombreCompleto'];
                                                $contrasenaNuevo = $_POST['contrasena'];
                                                $categoriaNuevo = $_POST['categoria'];
                                                $tipoNuevo = $_POST['tipo'];

                                                
                                                $objeto = new metodos();
                                                $objeto->actualizarUsuario($nombreNuevo,$nombreCompletoNuevo,$contrasenaNuevo,$categoriaNuevo,$tipoNuevo,$id);
                                                
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
                                                $conexion = mysqli_connect('localhost', 'root', '', 'searchin');
                                                $sql = "UPDATE marcadores SET usuario='$nombreNuevo' WHERE usuario='$nombre'";
                                                $resultado = mysqli_query($conexion,$sql);

                                                $_SESSION['hecho'] = "si";
                                                echo "<script type='text/javascript'>location.href = './editarUsuario.php'</script>"; exit;
                                                // Al enviar los datos, cambiamos el valor de la variable de session "hecho", lo que nos lleva a la rama de código del componente
                                                // que nos servirá de mensaje de confirmación, y nos redirijirá a la página de Inicio
                                            }
                                        
                                            ?>
                                        </div>
                                    </div>
                                </form>

                            <?php
                        // Cargaremos la opción de editar los usuarios
                        }else if($_GET['metodo'] == "borrar"){

                            $id = $_GET['id'];

                            // Recuperamos los datos asociados a la ID que obtenemos por url
                            $objeto = new metodos();
                            $sql = "SELECT * FROM usuario WHERE id = '$id'";
                            $datos = $objeto->mostrarDatos($sql);

                            // Los asignamos a variables 
                            foreach ($datos as $clave) {
                                $id = $clave['id'];
                                $nombre = $clave['nombre'];
                                $nombreCompleto = $clave['nombreCompleto'];
                                $contrasena = $clave['contrasena'];
                                $categoria = $clave['categoriaSeleccionada'];
                                $tipo = $clave['tipo'];
                            }

                        ?>  
                            <!-- Definimos la interfaz e implementamos un formulario para mostrar posteriormente los datos -->
                            <form action="" style="margin:0 auto" method="POST">
                            <div id="contenido">
                                <div id="principal" style="width: 25%">
                                    <p style="color:dimgray; text-decoration: underline; margin-bottom: 2rem; text-align: center; font-size: 1rem">Borrar Usuario</p>
                                    <div id="campos">
                                        <div id="textos">
                                            <p>ID:</p>
                                            <p>Nombre:</p>
                                            <p>Nombre Completo:</p>
                                            <p>Contraseña:</p>
                                            <p>Categoria Seleccionada:</p>
                                            <p>Tipo de Usuario:</p>
                                        </div>
                                        <!-- Mostramos los datos asociados a la id que obtuvimos, pero esta vez desactivados, para evitar su edición -->
                                        <div id="inputs">
                                            <input type="text" class="inputTexto" value="<?php echo $id; ?>" disabled>
                                            <input type="text" class="inputTexto" value="<?php echo $nombre; ?>" disabled>
                                            <input type="text" class="inputTexto" value="<?php echo $nombreCompleto; ?>" disabled>
                                            <input type="text" class="inputTexto" value="<?php echo $contrasena; ?>" disabled>
                                            <input type="text" class="inputTexto" value="<?php echo $categoria; ?>" disabled>
                                            <input type="text" class="inputTexto" value="<?php echo $tipo; ?>" disabled>
                                        </div>
                                    </div>
                                    <!-- Botones de navegación y de envío del formulario --> 
                                    <input type=submit name="borrar" value="Borrar" id="botonEnviar" style="width: 73%; margin-top: 3rem; margin-bottom: 0.5rem"> 
                                    <div id="botones">
                                        <a href="./formUsuarios.php" id="botonEnviar" style="width: 20%;">Volver</a> 
                                        <a href="./index.php" id="botonEnviar" style="width: 20%">Inicio</a> 
                                    </div>
                                    <!-- Si enviamos el formulario, la aplicación obtendrá los nuevos resultados editados en cada campo y los borrará de la BD --> 
                                    <?php
                                        if(isset($_POST['borrar'])){
                                            $_SESSION['hecho'] = "si";

                                            $id = $_GET['id'];

                                            $objeto = new metodos();
                                            $objeto->borrarUsuario($id);
                                            
                                            $sql = "SELECT * FROM usuario WHERE id = '$id'";
                                            $datos = $objeto->mostrarDatos($sql);
                                            foreach($datos as $clave){
                                                $nombre = $clave['nombre'];
                                            }

                                            $objeto = new metodos();
                                            $objeto-> borrarMarcadores($nombre);
                                            echo "<script type='text/javascript'>location.href = './editarUsuario.php'</script>"; exit;
                                        }
                                            // Al enviar los datos, cambiamos el valor de la variable de session "hecho", lo que nos lleva a la rama de código del componente
                                            // que nos servirá de mensaje de confirmación, y nos redirijirá a la página de Inicio
                                        ?>

                                </div>
                            </div>
                            </form>

                            <?php
                            
                        // Cargaremos la opción de crear un nuevo usuario
                        }else if($_GET['metodo'] = "nuevoUsuario"){

                            ?>  <!-- Definimos la interfaz e implementamos un formulario para guardar posteriormente los datos -->
                            <form action="" style="margin:0 auto" method="POST">
                            <div id="contenido">
                                <div id="principal" style="width: 25%">
                                    <p style="color:dimgray; text-decoration: underline; margin-bottom: 2rem; text-align: center; font-size: 1rem">Crear Nuevo Usuario</p>
                                    <div id="campos">
                                        <div id="textos">
                                            <p>ID:</p>
                                            <p>Nombre:</p>
                                            <p>Nombre Completo:</p>
                                            <p>Contraseña:</p>
                                            <p>Categoria Seleccionada:</p>
                                            <p>Tipo de Usuario:</p>
                                        </div>

                                        <div id="inputs"><!-- Campos a rellenar para el nuevo usuario -->
                                            <input type="text" name="id" class="inputTexto" value="La ID se generará automáticamente" disabled>
                                            <input type="text" name="nombre" class="inputTexto" value="" placeholder="Nombre">
                                            <input type="text" name="nombreCompleto" class="inputTexto" value="" placeholder="Nombre Completo">
                                            <input type="text" name="contrasena" class="inputTexto" value="" placeholder="Contraseña">
                                            <select name="categoria" id="inputTexto">
                                                    <option value="Todo">Todo (Por defecto)</option>
                                                    <option value="Nacional">Nacional</option>
                                                    <option value="Internacional">Internacional</option>
                                                    <option value="Economia">Economia</option>
                                                    <option value="Deportes">Deportes</option>
                                                    <option value="Opinion">Opinión</option>
                                                </select>
                                            <select name="tipo" id="inputTexto">
                                                <option value="Lector">Lector (Por defecto)</option>
                                                <option value="Redactor">Redactor</option>
                                                <option value="Administrador">Administrador</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Botones de navegación y de envío del formulario --> 
                                    <input type=submit name="crear" value="Crear" id="botonEnviar" style="width: 73%; margin-top: 3rem; margin-bottom: 0.5rem"> 
                                    <div id="botones">
                                        <a href="./formUsuarios.php" id="botonEnviar" style="width: 20%;">Volver</a> 
                                        <a href="./index.php" id="botonEnviar" style="width: 20%">Inicio</a> 
                                    </div>
                                    <!-- Si enviamos el formulario, la aplicación obtendrá los nuevos resultados introducidos en cada campo y los guardará en la BD --> 
                                    <?php
                                        if(isset($_POST['crear'])){
                                            // Guarda los datos introducidos en cada campo y los inserta en variables
                                            $nombre = $_POST['nombre'];
                                            $nombreCompleto = $_POST['nombreCompleto'];
                                            $contrasena = $_POST['contrasena'];
                                            $categoria = $_POST['categoria'];
                                            $tipo = $_POST['tipo'];

                                            // Comprueba que el nombre no exista ya en la BD
                                            $objeto = new metodos();
                                            $sql = "SELECT * FROM usuario WHERE nombre= '$nombre'";
                                            $datos = $objeto->mostrarDatos($sql);
                                            foreach($datos as $clave){
                                                $nombreRevisar = $clave['nombre'];
                                            }
                                            $nombreLocal = strtolower($nombre);
                                            $nombreRevisar = strtolower($nombreRevisar);
                            
                                            if($nombreLocal == $nombreRevisar){
                                                $usuarioExiste = "si";
                                            }

                                            // Comprueba que todos los campos están cumplimentados
                                            if($nombre == "" || $nombreCompleto == "" || $contrasena == "" || $categoria == "" || $tipo == ""){
                                                echo'<script type="text/javascript">
                                                    alert("Todos los campos deben estar cumplimentados");
                                                    </script>';
                                            }else if($usuarioExiste == "si"){
                                                echo'<script type="text/javascript">
                                                    alert("Ya existe un usuario con ese nombre");
                                                    </script>';
                                            }else{ // Si todo está bien, guarda los datos en la BD
                                                $objeto1 = new metodos();
                                                $objeto1->insertarUsuario($nombre,$nombreCompleto,$contrasena,$categoria,$tipo);
                                                $objeto2 = new metodos();
                                                $objeto2->insertarMarcadores($nombre,"Favorito","URL","Favorito","URL","Favorito","URL","Favorito","URL","Favorito","URL");
                                                $_SESSION['hecho'] = "si";
                                            }
                                            echo "<script type='text/javascript'>location.href = './editarUsuario.php'</script>"; exit;
                                            // Una vez hecho esto, la página se actualiza para ir a la rama del código que nos enseña un mensaje de confirmación y nos redirige a Inicio
                                        }

                                        ?>

                                </div>
                            </div>
                            </form>
                            <?php

                        }
                    }
                }
            }else if($_SESSION['hecho'] == "si"){
                ?> <!-- Si algo ha cambiado en la BD (mediante el envío de un formulario) se muestra un mensaje de confirmación y se nos redirige a Inicio --> 
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