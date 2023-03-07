<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Carga de los scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/index.js"></script>
    <title>Search-In</title>
    <link rel="stylesheet" type="text/css" href="styles/index.css"/>
</head>
<body>

    <!-- Iniciamos la sesión -->
    <?php
        session_start();
        require_once ("./conexion.php");
        require_once ("./metodos.php");
        $_SESSION['hecho'] = "no";
    ?>
    
    <!-- Creacion del header -->
    <div class='header'>
        <!-- Botones del menu -->
        <img src='./imgs/flecha.svg' alt="" id='flechaAbsoluta1'>
        <?php
            if(isset($_SESSION['usuario'])){
                echo "<img src='./imgs/flecha.svg' alt='' id='flechaAbsoluta2'>";
            }else{
                echo "<img src='./imgs/flecha.svg' alt='' id='flechaAbsolutaBuscar'>";
            }
        ?>
        <!-- Boton Inicio -->
        <div class="nav">
            <span class='boton' id='inicio'>Inicio</span>
            <?php 
                if(isset($_SESSION['usuario'])){
            ?><!-- Boton de login -->
                <span class='boton' id='login'>Usuario (<span style='color:#D6EAF8;text-decoration:underline;'><?php echo $_SESSION['usuario']; ?></span>)</span>
                <?php
                }else{
            ?>
                <span class='boton' id='login'>Login</span>
            <?php
                }
            ?><!-- Boton de Registro -->
            <span class='boton' id='registro'>Registro</span>
            <?php
            // Si el usuario está registrado y es de tipo "Administrador", se añade el siguiente bloque:
            if(isset($_SESSION['tipo'])){
                if($_SESSION['tipo'] == "Administrador"){
                    echo "<span class='boton' id='formUsuarios'>Permisos</span>";
                }
            }
            ?>
            <!-- Boton de Contacto -->
            <span class='boton' id='contacto'>Contacto</span>

        </div>
        <!-- Texto central del logo -->
        <span id='textoLogo' href="/">Search-In</span>


        <!-- Campo de busqueda  externa -->
        <form action='http://www.google.com/search' id="google" class='busqueda' method="GET">
            <input type='text' name="q" id='campoBusqueda' placeholder='Buscar con Searchin...'>
        </form>
    </div>
    <!-- Subheader -->
    <div class='subheader'>
        <!-- Categorias -->
        <div class="categorias">
            <img src='./imgs/flecha.svg' alt="" id='flecha'>
            <form action="" method="POST" id="categorias">
                <div id="formularioFantasma"><!-- Barra de categoría horizontal  -->
                <input type="submit" class='boton1' id='todo' name="categoria" value="Todo"></input>
                <input type="submit" class='boton1' id='nacional' name="categoria" value="Nacional"></input>
                <input type="submit" class='boton1' id='internacional' name="categoria" value="Internacional"></input>
                <input type="submit" class='boton1' id='economia' name="categoria" value="Economia"></input>
                <input type="submit" class='boton1' id='deportes' name="categoria" value="Deportes"></input>
                <input type="submit" class='boton1' id='opinion' name="categoria" value="Opinion"></input>
                </div>
                <div id="formularioNormal"><!-- Barra de categoría vertical  -->
                <input type="submit" class='boton' id='todo' name="categoria" value="Todo"></input>
                <input type="submit" class='boton' id='nacional' name="categoria" value="Nacional"></input>
                <input type="submit" class='boton' id='internacional' name="categoria" value="Internacional"></input>
                <input type="submit" class='boton' id='economia' name="categoria" value="Economia"></input>
                <input type="submit" class='boton' id='deportes' name="categoria" value="Deportes"></input>
                <input type="submit" class='boton' id='opinion' name="categoria" value="Opinion"></input>
                </div>
            <?php
                //Al apretar el submit, guardamos el tipo de categoria que filtraremos para mostrar las noticias de dicha categoria.
                if(isset($_POST['categoria'])){
                    if(isset($_SESSION['usuario'])){
                        //Si el usuario esta logueado, también cambiará su categoría favorita.
                        $usuarioSeleccionado = $_SESSION['usuario'];
                        $_SESSION['categoria'] = $_POST['categoria'];
                        $categoriaSeleccionada = $_SESSION['categoria'];
                        $objeto = new metodos();
                        $objeto->actualizarCategoria($categoriaSeleccionada,$usuarioSeleccionado);
                    }else{
                        // Si no lo está, esta informacion se almacenará como una cookie
                        $_COOKIE['categoria'] = $_POST['categoria'];
                    }
                }else{
                    // El valor por defecto lo almacenamos como una cookie
                    $_COOKIE['categoria'] = 'Todo';
                }
            ?>
            </form>
        </div>
            <!-- Logo central -->
            <img src='./imgs/logoFinal.png' alt='' id='logo'>
        <!-- Marcadores -->
        <div class="marcadoresNormal">
            <?php
                if(isset($_SESSION['usuario'])){
                    echo "<span id='editarMarcadores'>✎</span>";
            }
            if(isset($_SESSION['usuario'])){
            ?><!-- Barra de marcadores para usuarios registrados horizontal  -->
            <a href="http://<?php echo $_SESSION['marcador1url']; ?>" class='boton' id='favorito1'><?php echo $_SESSION['marcador1nombre']; ?></a>
            <a href="http://<?php echo $_SESSION['marcador2url']; ?>" class='boton' id='favorito2'><?php echo $_SESSION['marcador2nombre']; ?></a>
            <a href="http://<?php echo $_SESSION['marcador3url']; ?>" class='boton' id='favorito3'><?php echo $_SESSION['marcador3nombre']; ?></a>
            <a href="http://<?php echo $_SESSION['marcador4url']; ?>" class='boton' id='favorito4'><?php echo $_SESSION['marcador4nombre']; ?></a>
            <a href="http://<?php echo $_SESSION['marcador5url']; ?>" class='boton' id='favorito5'><?php echo $_SESSION['marcador5nombre']; ?></a>
            <img src='./imgs/flecha.svg' alt="" id='flecha'>
        </div>
        <div class="marcadoresFantasma"><!-- Barra de marcadores para usuarios registrados vertical  -->
            <a href="http://<?php echo $_SESSION['marcador1url']; ?>" class='boton1' id='favorito1'><?php echo $_SESSION['marcador1nombre']; ?></a>
            <a href="http://<?php echo $_SESSION['marcador2url']; ?>" class='boton1' id='favorito2'><?php echo $_SESSION['marcador2nombre']; ?></a>
            <a href="http://<?php echo $_SESSION['marcador3url']; ?>" class='boton1' id='favorito3'><?php echo $_SESSION['marcador3nombre']; ?></a>
            <a href="http://<?php echo $_SESSION['marcador4url']; ?>" class='boton1' id='favorito4'><?php echo $_SESSION['marcador4nombre']; ?></a>
            <a href="http://<?php echo $_SESSION['marcador5url']; ?>" class='boton1' id='favorito5'><?php echo $_SESSION['marcador5nombre']; ?></a>
            <?php
            }else{
                ?><!-- Barra de marcadores para usuarios no registrados vertical  -->
            <a href="./index.php" class='boton' id='favorito1'>Favorito</a>
            <a href="./index.php" class='boton' id='favorito2'>Favorito</a>
            <a href="./index.php" class='boton' id='favorito3'>Favorito</a>
            <a href="./index.php" class='boton' id='favorito4'>Favorito</a>
            <a href="./index.php" class='boton' id='favorito5'>Favorito</a>
            <img src='./imgs/flecha.svg' alt="" id='flecha'>
        </div>
        <div class="marcadoresFantasma"><!-- Barra de marcadores para usuarios no registrados vertical  -->
            <a href="./index.php" class='boton1' id='favorito1'>Favorito</a>
            <a href="./index.php" class='boton1' id='favorito2'>Favorito</a>
            <a href="./index.php" class='boton1' id='favorito3'>Favorito</a>
            <a href="./index.php" class='boton1' id='favorito4'>Favorito</a>
            <a href="./index.php" class='boton1' id='favorito5'>Favorito</a>
            <?php
            }   // Si el usuario está registrado, será capaz de editar los marcadores.
                if(isset($_SESSION['usuario'])){
                    echo "<span id='editarMarcadoresFantasma'>Editar ✎</span>";
                }
            ?>
        </div>
    </div>
            <!-- Creacion de la consulta -->
    <?php
        // Filtramos por categoria seleccionada


        // En funcion de la categoria seleccionada, cargamos la lista
        if(isset($_SESSION['usuario'])){
            $usuario = $_SESSION['usuario'];
            $objeto = new metodos();
            $sql = "SELECT categoriaSeleccionada FROM usuario WHERE nombre = '$usuario'";
            $datos = $objeto->mostrarDatos($sql);
            foreach ($datos as $clave){
                $categoriaUsuario = $clave['categoriaSeleccionada'];
            }

            //Si seleccionamos todo, cargamos todas las noticias
            if($categoriaUsuario == "Todo"){
                $objeto = new metodos();
                $sql = 'SELECT * FROM noticias order by idNoticia desc';
                $datos = $objeto->mostrarDatos($sql);
            }else{
                // Si no, cargamos solo la seleccionada
                $objeto = new metodos();
                $sql = "SELECT * FROM noticias WHERE categoria='$categoriaUsuario' order by idNoticia desc";
                $datos = $objeto->mostrarDatos($sql);
            }
        }else{
            // En caso de no estar logueado, cargaremos por defecto la categoria "Todo"
            $categoriaUsuario = $_COOKIE['categoria'];
            if($categoriaUsuario == "Todo"){
                $objeto = new metodos();
                $sql = 'SELECT * FROM noticias order by idNoticia desc';
                $datos = $objeto->mostrarDatos($sql);
            }else{
                // Hasta que se aprete otra especifica
                $objeto = new metodos();
                $sql = "SELECT * FROM noticias WHERE categoria='$categoriaUsuario' order by idNoticia desc";
                $datos = $objeto->mostrarDatos($sql);
            }
        }
    ?>
    <!-- Creacion del cuerpo principal -->
    <div class='principal'>

    <!-- Creacion de las noticias -->
        <?php
            // Si hemos asignado la variable de sesion "tipo":
            if(isset($_SESSION['tipo'])){

                // Cargamos la lista de noticias
                foreach ($datos as $clave){

                    //Asignamos los valores a los resultados del while
                    $fondo = $clave['img'];
                    $titulo = $clave['titulo'];
                    $categoria = $clave['categoria'];
                    $autor = $clave['autor'];
                    $fecha = $clave['fecha'];
                    $url = $clave['url'];
                    $idNoticia = $clave['idNoticia'];
    
                    ?>
                        <!-- Creamos un contenedor al que le asignamos el cuerpo de la noticia -->
                        <div class="noticia" style="background:url(<?php echo $fondo; ?>) no-repeat; background-size:100%" onclick="location.href=' <?php echo $url; ?> '">
                    <?php
                        echo "<span id='fecha'>{$fecha}</span>";
                        // Ademas, si somos el usuario administrador, cargaremos los botones para editar y borrar la noticia:
                        if($_SESSION['tipo'] == "Administrador"){
                            echo "<a id='editar' href='./formNoticias.php?idNoticia={$idNoticia}&metodo=editar'>Editar</a>";
                            echo "<a id='editar' style='border-radius:0 0 0 5px;margin-left:2.32rem;border-radius:0 0.5rem 0.5rem 0' href='./formNoticias.php?idNoticia={$idNoticia}&metodo=borrar'>Borrar</a></a>";
                        }
                            echo "<span class='titulo'>";
                                echo $titulo;
                                echo "<span id='categoria'>{$categoria}</span>";
                                echo "<span id='autor'>{$autor}</span>";
                            echo "</span>";
                        echo "</div>";
                }
            }else{

                // Si no hemos asignado la variable tipo, cargaremos la lista por defecto
                foreach ($datos as $clave){

                    $fondo = $clave['img'];
                    $titulo = $clave['titulo'];
                    $categoria = $clave['categoria'];
                    $autor = $clave['autor'];
                    $fecha = $clave['fecha'];
                    $url = $clave['url'];
    
                    ?>
                        <div class="noticia" style="background:url(<?php echo $fondo; ?>) no-repeat; background-size:100%;" onclick="location.href=' <?php echo $url; ?> '">
                        
                    <?php
                  
                        echo "<span id='fecha'>{$fecha}</span>";
                            echo "<span class='titulo'>";
                                echo $titulo;
                                echo "<span id='categoria'>{$categoria}</span>";
                                echo "<span id='autor'>{$autor}</span>";
                            echo "</span>";
                        echo "</div>";
                }
            }
        ?>
    </div>


    <!-- Dependiendo del tipo de usuario que somos, cargaremos una opcion flotante u otra: -->
    <?php
    if(isset($_SESSION['tipo'])){
                if($_SESSION['tipo'] == 'Administrador'){
                    echo "<a id='nuevoArticulo' href='./login.php'>Logueado como '{$_SESSION['tipo']}'</a>";
                }
                if($_SESSION['tipo'] == 'Redactor'){
                    echo "<a id='nuevoArticulo' href='./formNoticias.php' style='bottom:4rem'>Nuevo Articulo<span id='signoMas'>+</span></a>";
                    echo "<a id='nuevoArticulo' href='./login.php'>Logueado como '{$_SESSION['tipo']}'</a>";
                }
            }
    ?>

    <!-- Contenedor con indicador de temperatura -->
    <div class="temperatura">
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-bdaa2f72-ab42-4402-a4b6-65af9dddbd5c"></div>
    </div>
   
</body>
</html>