<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Search-In: Login</title>
</head>
<body>

<?php   
    // Iniciamos la sesión para poder guardar datos de sesión
    session_start();
    // Requerimos los componentes de conexion y metodos para poder manejar los datos de entrada y salida hacia nuestra BD
    require_once ("./conexion.php");
    require_once ("./metodos.php");
    error_reporting(0);
    

?>      <!-- Definimos la interfaz e implementaremos un formulario que nos servirá para introducir los datos de login -->
        <div class='pantallaLog'>
        <form action="" method="post" id="formLogin">
<?php
    // Comprobamos que el usuario no esté registrado
    if(!isset($_SESSION['usuario'])){
?>
            <!-- Mostramos la cabecera de la interfaz -->
            <div class="encabezado1">
            <p id="textoLogin" style="font-size:1.3rem; text-decoration: underline">¡Bienvenid@!</p>
            <p id="textoLogin">Introduce tus datos:</p>
            </div>
            <input type="text" class="campoLogin" name="nick" placeholder="Nick">
            <input type="password" class="campoLogin" name="contrasena" placeholder="Contraseña">
            <div class="botonesLogin">
                <input type="submit" value="Enviar" id="enviar">
                <a href="./registro.php" id="registrarse"><span style="text-align:center">Registrarse</span></a>
            </div>
<?php
    }else{
        // Si el usuario está ya logueado, cargaremos los datos del usuario activo
        $usuario = $_SESSION['usuario'];

        // Recuperamos los datos del usuario activo
        $objeto = new metodos();
        $sql = "SELECT * FROM usuario WHERE nombre = '$usuario'";
        $datos = $objeto->mostrarDatos($sql);

        // Los guardamos en variables locales para mostrarlos posteriormente
        foreach ($datos as $clave){
            $usuarioCompleto = $clave['nombreCompleto'];
            $categoriaSeleccionada = $clave['categoriaSeleccionada'];
            $tipoUsuario = $clave['tipo'];
        }
        // Mostramos por pantalla toda la información del usuario activo bien estructurada
        echo "<div class='encabezado2'>";
        echo "<p id='mensajeFlotante' style='margin-top:0;font-size: 1.5rem; text-decoration: underline'>Datos del usuario</p>";
        echo "</div>";
        echo "<div id='datosUsuario'>";
            echo "<div style='text-align: left'>";
                echo "<p id='mensajeFlotante' style='font-size:1rem;margin-top:1.5rem;'><b>Nombre:</b></p>";
                echo "<p id='mensajeFlotante' style='font-size:1rem;margin-top:0.2rem;'><b>Nombre completo:</b></p>";
                echo "<p id='mensajeFlotante' style='font-size:1rem;margin-top:0.2rem;'><b>Categoria seleccionada:</b></p>";
                echo "<p id='mensajeFlotante' style='font-size:1rem;margin-top:0.2rem;'><b>Tipo de usuario:</b></p>";
            echo "</div>";

            echo "<div style='text-align: right'>";
                echo "<p id='mensajeFlotante' style='font-size:1rem;margin-top:1.3rem;'>$usuario</p>";
                echo "<p id='mensajeFlotante' style='font-size:1rem;margin-top:0.2rem;'>$usuarioCompleto</p>";
                echo "<p id='mensajeFlotante' style='font-size:1rem;margin-top:0.2rem;'>$categoriaSeleccionada</p>";
                echo "<p id='mensajeFlotante' style='font-size:1rem;margin-top:0.2rem;'>$tipoUsuario</p>";
            echo "</div>";
        echo "</div>";
    }
?>
    <!-- Botón de Inicio -->
    <a href="./index.php" id="inicio">Inicio</a>

    <?php
        // Si el usuario no está logueado, guardaremos los datos introducidos en los campos
        $usuario = $_POST['nick'];
        $contrasena = $_POST['contrasena'];

        // Dichos datos los guardaremos en la BD
        $objeto = new metodos();
        $sql = "SELECT * FROM usuario WHERE nombre= '$usuario' AND contrasena='$contrasena'";
        $datos = $objeto->mostrarDatos($sql);
        
        foreach ($datos as $clave){

            $tipoUsuario = $clave['tipo'];
        }

        // Si el usuario ya estaba logueado, mostraremos los botones de salir y cerrar sesión unicamente (ademas de la información de usuario)
        if(isset($_SESSION['usuario'])){ ?>

        <form action="" method="POST">
            <input type="submit" name="Salir" value="Cerrar sesión" id="formSalir">
            <?php // Si pulsamos en cerrar sesión, se nos mostrará un mensaje de confirmacion y se nos redirigirá a la pantalla de login
                if(isset($_POST['Salir'])){
                    if($_POST['Salir']=="Cerrar sesión"){
                        session_destroy();
                        echo "<p id='mensajeFlotante'>Cerrando sesión...</p>";
                        echo "<p id='mensajeFlotante'><img src='./imgs/loading.svg' id='cargando'></img></p>";
                        header("refresh: 2; url= ./login.php");
                    }
                }else{
                    ?> <!-- Si el usuario está logueado, se nos mostrará un mensaje en el extremo inferior con el nombre de usuario activo -->
                    <p id='mensajeFlotante'><?php echo "Logueado como: {$_SESSION['usuario']}"; ?></p>
                    <?php
                }
            ?>
        </form>
        <?php
        }else{ // Si el usuario no estaba logueado, una vez introducidos todos los datos en los campos, procederemos a conectar con la bd
            $c= new Conectar();
            $conexion = $c->conexion();
            $consulta=mysqli_query($conexion,$sql);
            if(mysqli_num_rows($consulta) > 0){
                $_SESSION['usuario'] = $usuario;
                $_SESSION['tipo'] = $tipoUsuario;

                $objeto = new metodos();
                $sql = "SELECT * FROM marcadores WHERE usuario='$usuario'";
                $datos = $objeto-> mostrarDatos($sql);
    
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

                $_SESSION['marcador1nombre'] = $marcador1nombre;
                $_SESSION['marcador1url'] = $marcador1url;
                $_SESSION['marcador2nombre'] = $marcador2nombre;
                $_SESSION['marcador2url'] = $marcador2url;
                $_SESSION['marcador3nombre'] = $marcador3nombre;
                $_SESSION['marcador3url'] = $marcador3url;
                $_SESSION['marcador4nombre'] = $marcador4nombre;
                $_SESSION['marcador4url'] = $marcador4url;
                $_SESSION['marcador5nombre'] = $marcador5nombre;
                $_SESSION['marcador5url'] = $marcador5url;

                // Si el usuario con el que intentamos loguearnos, existe en la BD, mostrará un mensaje de éxito
                echo "<p id='mensajeFlotante'>Bienvenido {$_SESSION['usuario']}.</p>";
                echo "<p id='mensajeFlotante'><img src='./imgs/loading.svg' id='cargando'></img></p>";
                header("refresh: 2; url= ./index.php");

            }else{
                if(($usuario == "") || ($contrasena == "")){
                    echo "";
                }else{
                    // Si el usuario con el que intentamos loguearnos, no existe en la BD, nos mostrará un mensaje de error
                    echo "<p id='mensajeFlotante'>El usuario introducido no es correcto</p>";
                }
            }
        }
    ?>
    </form>
</div>
</body>
</html>
