<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/formUsuarios.css">
    <title>Search-In: Panel de Control</title>
</head>
<body>

    <?php
        // Iniciamos la sesión para poder guardar datos de sesión
        session_start();
        // Requerimos los componentes de conexion y metodos para poder manejar los datos de entrada y salida hacia nuestra BD
        require_once "./conexion.php";
        require_once "./metodos.php";
        // Comprobamos mediante la siguiente variable de sesión, que el formulario aún no ha sido enviado
        $_SESSION['hecho'] = "no";

        // Comprobamos que el usuario esté registrado
        if(isset($_SESSION['tipo'])){
            // Comprobamos que el usuario sea de tipo administrador
            if($_SESSION['tipo'] == "Administrador"){

                // Cargamos los datos de todos los usuarios existentes en la BD
                $objeto = new metodos();
                $sql = 'SELECT * FROM usuario order by id asc';
                $datos = $objeto->mostrarDatos($sql);
                ?>

                <!-- Definimos la interfaz que nos servirá de panel de control de administrador -->
                <div id="contenido">

                    <div id="principal">
                        <div>
                            <p>Panel de Administración</p>
                        <table>
                            <tr> <!-- Sección de datos del usuario -->
                                <th>ID de Usuario</th>
                                <th>Nick</th>
                                <th>Nombre Completo</th>
                                <th>Contraseña</th>
                                <th>Categoria Seleccionada</th>
                                <th>Tipo de Usuario</th>
                                <th class="celdaEditar">Editar</th>
                            </tr>

                            <!-- Recuperamos los datos de cada usuario y los introducimos en variables locales para mostrarlos posteriormente -->
                            <?php 
                            foreach ($datos as $clave){
                                $id = $clave['id'];
                                $nombre = $clave['nombre'];
                                $nombreCompleto = $clave['nombreCompleto'];
                                $contrasena =  $clave['contrasena'];
                                $categoria = $clave['categoriaSeleccionada'];
                                $tipo = $clave['tipo'];
                            ?>
                            <tr> <!-- Mostramos los datos de los diferentes usuarios -->
                                <td><?php echo $id; ?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $nombreCompleto; ?></td>
                                <td><?php echo $contrasena; ?></td>
                                <td><?php echo $categoria; ?></td>
                                <td><?php echo $tipo; ?></td>
                                <!-- Botones que permiten editar o borrar el respectivo usuario (asociado por una id) -->
                                <td><a href="./editarUsuario.php?id=<?php echo $id; ?>&metodo=editar" class="boton">✎</a> <a href="./editarUsuario.php?id=<?php echo $id; ?>&metodo=borrar"  class="boton">🗙</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                        <table> <!-- Sección de Marcadores -->
                            <tr class="seccionMarcadores">
                                <th class="tituloMarcadores">Usuario</th>
                                <th class="tituloMarcadores">Marcadores nº1: Nombre</th>
                                <th class="tituloMarcadores">Marcadores nº1: URL</th>
                                <th class="tituloMarcadores">Marcadores nº2: Nombre</th>
                                <th class="tituloMarcadores">Marcadores nº2: URL</th>
                                <th class="tituloMarcadores">Marcadores nº3: Nombre</th>
                                <th class="tituloMarcadores">Marcadores nº3: URL</th>
                                <th class="tituloMarcadores">Marcadores nº4: Nombre</th>
                                <th class="tituloMarcadores">Marcadores nº4: URL</th>
                                <th class="tituloMarcadores">Marcadores nº5: Nombre</th>
                                <th class="tituloMarcadores">Marcadores nº5: URL</th>
                                <th class="celdaEditar">Editar</th>
                            </tr>
                            <?php
                            // Recuperamos los datos de cada usuario (los datos de marcadores) y los introducimos en variables locales para mostrarlos posteriormente 
                            $sql = 'SELECT * FROM marcadores order by id';
                            $datos = $objeto->mostrarDatos($sql);

                            foreach ($datos as $clave) {
                                $nombre = $clave['usuario'];
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
                            ?>

                            <tr> <!-- Mostramos los marcadores de cada usuario -->
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $marcador1nombre; ?></td>
                                <td><?php echo $marcador1url; ?></td>
                                <td><?php echo $marcador2nombre; ?></td>
                                <td><?php echo $marcador2url; ?></td>
                                <td><?php echo $marcador3nombre; ?></td>
                                <td><?php echo $marcador3url; ?></td>
                                <td><?php echo $marcador4nombre; ?></td>
                                <td><?php echo $marcador4url; ?></td>
                                <td><?php echo $marcador5nombre; ?></td>
                                <td><?php echo $marcador5url; ?></td>

                            <?php 

                            ?>
                                <!-- Botones que permiten editar o borrar los marcadores de usuario (asociado por una id) -->
                                <td><a href="./editarMarcadores.php?nombre=<?php echo $nombre; ?>&metodo=editar" class="boton">✎</a>  <a href="./editarMarcadores.php?nombre=<?php echo $nombre; ?>&metodo=borrar"  class="boton">🗙</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                        <!-- Botones de navegación -->
                        <a href="./editarUsuario.php?metodo=nuevoUsuario" id="botonEnviar" style="width: 20%">Nuevo Usuario</a> 
                        <a href="./index.php" id="botonEnviar">Inicio</a> 
                        </div>
                    </div>


                </div>

                <?php   
            }else{
                ?>  <!-- Si el tipo de usuario no es "Administrador" mostrará un error -->
                    <div id="contenido">
                        <div id="principal" style="width: 25%">
                            <p>No tienes permiso para ver esto</p>
                            <a href="./index.php" id="botonEnviar" style="width: 20%">Inicio</a> 
                        </div>
                    </div>
                <?php
            }
        }else{
            ?>  <!-- Si el usuario no está registrado, mostrará un error -->
                <div id="contenido">
                    <div id="principal" style="width: 25%">
                        <p style="color:white">No tienes permiso para ver esto</p>
                        <a href="./index.php" id="botonEnviar" style="width: 20%">Inicio</a> 
                    </div>
                </div>
            <?php
        }
    ?>

<!-- Carga del módulo de jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // Esta función restringe el uso del panel de control a dispositivos de escritorio (o dispositivos con resolución mayor a 1080px)
    $(window).resize(function(){location.reload();});

        if ($(window).width() < 779 ){
            $("p").text("Para ver el Panel de Administración, es necesario usar resoluciones mayores ( O el modo escritorio )")
        }
</script>
</body>
</html>