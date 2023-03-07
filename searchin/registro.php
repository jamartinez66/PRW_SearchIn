<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registro.css">
    <title>Search-In: Registro</title>
</head>
<body>

<?php   
    session_start();
    require ("./conexion.php");
    require ("./metodos.php");
    error_reporting(0);

    echo "<div class='pantallaLog'>";
    echo "<form action='' method='post' id='formLogin'>";

    if(!isset($_SESSION['usuario'])){
    ?>  
        <form action="#" method="POST" style="text-align:center">
            <div class="encabezado1">
            <p id="textoLogin">¡Regístrate!</p>
            </div>
            <input type="text" class="campoLogin" name="nick" placeholder="Nick"  style="text-align:center">
            <input type="text" class="campoLogin" name="nombre" placeholder="Nombre completo"  style="text-align:center">
            <input type="password" class="campoLogin" name="contrasena1" placeholder="Contraseña"  style="text-align:center">
            <input type="password" class="campoLogin" name="contrasena2" placeholder="Repetir contraseña"  style="text-align:center">
            <select name="categoria" id="categoria">
                <option value="" class="option" disabled selected >Categoría Favorita</option>
                <option value="Todo" class="option">Todo</option>
                <option value="Nacional" class="option">Nacional</option>
                <option value="Internacional" class="option">Internacional</option>
                <option value="Economia" class="option">Economía</option>
                <option value="Deportes" class="option">Deportes</option>
                <option value="Opinión" class="option">Opinión</option>
            </select>
            <div style="margin-top: 1rem;">
            <input type="checkbox" name="estadoLogin" value="si" id="estadoLogin">
            <label for="estadoLogin" id="checkbox">Iniciar sesión directamente</label>
            </div>

        <div class="botonesLogin">
            <input type="submit" name="datos" value="Enviar" id="enviar">
            <a href="./login.php" id="registrarse"><span>Loguearse</span></a>
        </div>

        <a href="./index.php" id="inicio">Inicio</a>
        
        <?php
        if(isset($_POST['datos'])){
            if($_POST['datos'] == "Enviar"){

                $nombre = $_POST['nick'];
                $nombreCompleto = $_POST['nombre'];
                $contrasena1 = $_POST['contrasena1'];
                $contrasena2 = $_POST['contrasena2'];
                $categoria = $_POST['categoria'];
                $tipo = "Lector";
                $loginDirecto = $_POST['estadoLogin'];

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

                if($nombre == "" || $nombreCompleto == "" || $contrasena1 == "" || $contrasena2 == "" ||$categoria == "" || $tipo == ""){
                    echo "<p id='mensajeFlotante'>*Todos los campos deben estar cumplimentados.</p>";
                }else if($contrasena1 != $contrasena2){
                    echo "<p id='mensajeFlotante'>*Las contraseñas no coinciden.</p>";
                }else if($usuarioExiste == "si"){

                    echo "<p id='mensajeFlotante'>El usuario {$nombre} ya existe.</p>";

                }else{
                    if(isset($_POST['estadoLogin'])){
                        if($loginDirecto == "si"){

                            $objeto1 = new metodos();
                            $objeto1->insertarUsuario($nombre,$nombreCompleto,$contrasena1,$categoria,$tipo);    
                            $objeto2 = new metodos();
                            $objeto2->insertarMarcadores($nombre,'Favorito',"URL","Favorito","URL","Favorito","URL","Favorito","URL","Favorito","URL");
                            echo "<p id='mensajeFlotante'>Se ha creado el usuario '{$nombre}' con éxito.</p>";
                            echo "<p id='mensajeFlotante'>Redirigiendo.</p>";
                            echo "<p id='mensajeFlotante'><img src='./imgs/loading.svg' id='cargando'></img></p>";
                            $_SESSION['usuario'] = $nombre;

                            $objeto3 = new metodos();
                            $sql = "SELECT * FROM marcadores WHERE usuario='$nombre'";
                            $datos = $objeto3-> mostrarDatos($sql);
                
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
                            header("refresh: 2; url= ./index.php");
                        }

                    }else{
                        $objeto1 = new metodos();
                        $objeto1->insertarUsuario($nombre,$nombreCompleto,$contrasena1,$categoria,$tipo);
                        $objeto2 = new metodos();
                        $objeto2->insertarMarcadores($nombre,"Favorito","URL","Favorito","URL","Favorito","URL","Favorito","URL","Favorito","URL");
                        echo "<p id='mensajeFlotante'>Se ha creado el usuario '{$nombre}' con éxito.</p>";
                        echo "<p id='mensajeFlotante'>Redirigiendo.</p>";
                        echo "<p id='mensajeFlotante'><img src='./imgs/loading.svg' id='cargando'></img></p>";
                        header("refresh: 2; url= ./login.php");
                    }
                }
            }
        }
        
        ?>
        </form>
        <?php
    }else{
    ?>

    <div class="encabezado1">
    <p id="textoLogin" style="text-decoration: underline"><span style="font-size:1rem;">⚠</span> Información <span style="font-size:1rem;">⚠</span></p>
    <p id="textoLogin" style='font-size:0.9rem; font-weight: 300;'>Para realizar un nuevo registro, primero debe cerrar la sesión actual.</p>
    </div>
    <form action="" method="POST" id='formSalir'>
        <input type="submit" name="Salir" value="Cerrar sesión" id='botonSalir'>
        <a href="./index.php" id="inicio" style="margin-bottom: 1.5rem">Inicio</a>
        <?php
                if(isset($_POST['Salir'])){
                    if($_POST['Salir']=="Cerrar sesión"){
                        session_destroy();
                        echo "<p id='mensajeFlotante'>Cerrando sesión...</p>";
                        echo "<p id='mensajeFlotante'><img src='./imgs/loading.svg' id='cargando'></img></p>";
                        header("refresh: 2; url= ./registro.php");
                    }
                }else{
                    ?>
                    <p id='mensajeFlotante'><?php echo "Logueado como: {$_SESSION['usuario']}"; ?></p>
                    <?php
                }
        ?>
    </form>
    <?php 

    }
    ?>

</body>
</html>
