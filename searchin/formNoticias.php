<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/formNoticias.css">
    <title>Search-In: Noticias</title>
</head>
<body>
    <?php
        // Iniciamos la sesión para poder guardar datos de sesión
        session_start();
        // Requerimos los componentes de conexion y metodos para poder manejar los datos de entrada y salida hacia nuestra BD
        require_once "./conexion.php";
        require_once "./metodos.php";
        // Comprobamos que el usuario que esta accediendo es el administrador, para tener permisos para editar o borrar la noticia
        if(isset($_SESSION['usuario'])){
            if($_SESSION['tipo'] == "Administrador"){
                // Si no se ha especificado una id por parámetro de url, se mostrará un mensaje de error.
                if(!isset($_GET['idNoticia'])){
                    ?>
                    <div class="borrado">
                    <span>No tienes permiso para ver esto</span>
                    <a href="./index.php" id="volver">Volver</a>
                    </div>
                    <?php

                }else{ // Si se ha especificado una id por parametro de url
                    $id = $_GET['idNoticia'];      

                    // se conectará con la BD 
                    $objeto = new metodos();
                    $sql = "SELECT * FROM noticias WHERE idNoticia = '$id'";
                    $datos = $objeto->mostrarDatos($sql);

                    // para guardar los datos asociados a la id, en variables
                    foreach ($datos as $clave){
                        $idNoticia = $clave['idNoticia'];
                        $titulo = $clave['titulo'];
                        $categoria = $clave['categoria'];
                        $autor = $clave['autor'];
                        $fecha = $clave['fecha'];
                        $url = $clave['url'];
                        $img = $clave['img'];
                    }

                    // Si existe la id de noticia, se cargará un formulario con los datos asociados a esa id
                    if(isset($idNoticia)){
                        if($idNoticia > 0){
                            
                            ?>  <!-- Definimos la interfaz e implementamos un formulario para mostrar posteriormente los datos -->
                            <div class="pantallaForm">
                                <form action="#" method="post" id="formNoticias">
                                <p style="text-align:center; padding-bottom: 3rem; font-weight: medium; font-size:2rem; color:white; text-decoration:underline">Datos de la noticia:</p>
                                    <div id="input">
                                        <span>ID: </span>
                                        <input type="text" name="id" value="<?php echo $id; ?>" style="text-align:center">
                                    </div>
                                    <div id="input" style="height: 10rem">
                                        <span>Título: </span>
                                        <textarea name="titulo" style="text-align:center"><?php echo $titulo; ?></textarea>
                                    </div>
                                    <div id="input">
                                        <span>Categoría: </span> 
                                        <select name="categoria" style='width: 80.5%;border-radius:1rem; text-align:center; outline:none; border: 0'>
                                            <option value="" disabled>Elige una categoria</option>
                                            <option value="Nacional" <?php if($categoria == "Nacional"){ echo "selected";} ?>>Nacional</option>
                                            <option value="Internacional" <?php if($categoria == "Internacional"){ echo "selected";} ?>>Internacional</option>
                                            <option value="Economia" <?php if($categoria == "Economia"){ echo "selected";} ?>>Economia</option>
                                            <option value="Deportes" <?php if($categoria == "Deportes"){ echo "selected";} ?>>Deportes</option>
                                            <option value="Opinion" <?php if($categoria == "Opinion"){ echo "selected";} ?>>Opinion</option>
                                        </select>
                                    </div>
                                    <div id="input">
                                        <span>Autor: </span>
                                        <input type="text" name="autor" value="<?php echo $autor; ?> " style="text-align:center">
                                    </div>
                                    <div id="input">
                                        <span>Fecha: </span>
                                        <input type="date" name="fecha" value="<?php echo $fecha; ?>" style="text-align:center">
                                    </div>
                                    <div id="input">
                                        <span>URL: </span>
                                        <input type="text" name="url" value="<?php echo $url; ?>">
                                    </div>
                                    <div id="input" style="margin-bottom:2rem">
                                        <span>IMG: </span>
                                        <input type="text" name="img" value="<?php echo $img; ?>">
                                    </div>
                                    <div id="inputFinal">
                                    <?php // Si el método elegido por parametro fue el de editar, se ejecturá la acción de actualizar la noticia con los datos alterados
                                        if($_GET['metodo'] == "editar"){
                                            echo "<input type='submit' name='metodo' value='Actualizar' id='enviar' onclick='noticiaActualizada()'>";
                                          // Si el método elegido por parametro fue el de borrar, se ejecturá la acción de borrar la noticia en su totalidad
                                        }else if($_GET['metodo'] == "borrar"){
                                            echo "<input type='submit' name='metodo' value='Borrar' id='enviar'>";
                                        }
                                    ?>
                                        <!-- Botón de volver -->
                                        <a href="./index.php" id="volver">Volver</a>
                                    </div>
                                </div>
                                </form>
                            </div>
                        <?php 
                        }  
                            if(isset($_POST['metodo'])){  // Si se envía el formulario ->
                               
                                if($_POST['metodo'] == "Actualizar"){ // Método de Actualizar
                                    
                                    $tituloNuevo = $_POST['titulo'];
                                    $categoriaNuevo = $_POST['categoria'];
                                    $autorNuevo = $_POST['autor'];
                                    $fechaNuevo = $_POST['fecha'];
                                    $urlNuevo = $_POST['url'];
                                    $imgNuevo = $_POST['img'];

                                    $objeto = new metodos();
                                    $objeto->actualizarNoticia($tituloNuevo,$categoriaNuevo,$autorNuevo,$fechaNuevo,$idNoticia);
                                    header("Location: ./index.php");

                                }else if($_POST['metodo'] == "Borrar"){ // Método de Borrar
                                
                                    $objeto = new metodos();
                                    $objeto->borrarNoticia($idNoticia);

                                    header("Location: ./formNoticias.php?idNoticia={$idNoticia}&metodo=borrar");
                                }
                            }
                        }else{
                    ?>
                        <!-- Si la Id no existe, salta un mensaje de error -->
                        <div class="borrado">
                            <span>El valor se ha eliminado o no existe</span>
                            <a href="./index.php" id="volver">Volver</a>
                        </div>

                    <?php
                    }
                }
            }else if($_SESSION['tipo'] == "Redactor"){ // Si el tipo de usuario es Redactor, se tendrá el permiso solamente para crear un nuevo artículo
                ?>
                <div class="pantallaForm">  <!-- Definimos la interfaz e implementamos un formulario que tendremos que rellenar con los datos de la noticia -->
                    <form action="#" method="post" id="formNoticias">
                        <p style="text-align:center; padding-bottom: 3rem; font-weight: medium; font-size:2rem; color:white; text-decoration:underline">Datos de la noticia:</p>
                            <div id="input">
                                <span>ID: </span>
                                <input type="text" name="id" value="" placeholder="La ID se generará automáticamente" disabled>
                            </div>
                            <div id="input" style="height: 10rem">
                                <span>Título: </span>
                                <textarea name="titulo"></textarea>
                            </div>
                            <div id="input">
                                <span>Categoría: </span>
                                <select name="categoria" style='width: 80.5%;border-radius:1rem; text-align:center; outline:none; border: 0'>
                                            <option value="" selected disabled>Elige una categoria</option>
                                            <option value="Nacional">Nacional</option>
                                            <option value="Internacional">Internacional</option>
                                            <option value="Economia">Economia</option>
                                            <option value="Deportes">Deportes</option>
                                            <option value="Opinion">Opinion</option>
                                </select>
                            </div>
                            <div id="input">
                                <span>Autor: </span>
                                <input type="text" name="autor" value="">
                            </div>
                            <div id="input">
                                <span>Fecha: </span>
                                <input type="date" name="fecha" value="">
                            </div>
                            <div id="input">
                                <span>URL: </span>
                                <input type="text" name="url" value="">
                            </div>
                            <div id="input" style="margin-bottom:2rem">
                                <span>IMG: </span>
                                <input type="text" name="img" value="">
                            </div>
                            <div id="inputFinal">
                                <!-- Botones de navegación y de envío del formulario -->
                                <input type='submit' name='insertar' value='Insertar' id='enviar' onclick="noticiaInsertada()">
                                <a href="./index.php" id="volver">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>   
                <?php

                // Si se envía el formulario, se insertará la noticia con los datos introducidos en los campos del formulario anterior
                if(isset($_POST['insertar'])){
                    if($_POST['insertar'] == "Insertar"){
                        
                        $tituloNuevo = $_POST['titulo'];
                        $categoriaNuevo = $_POST['categoria'];
                        $autorNuevo = $_POST['autor'];
                        $fechaNuevo = $_POST['fecha'];
                        $urlNuevo = $_POST['url'];
                        $imgNuevo = $_POST['img'];
                        
                        $objeto = new metodos();
                        $objeto->insertarNoticia($tituloNuevo,$categoriaNuevo,$autorNuevo,$fechaNuevo,$urlNuevo,$imgNuevo);
                        $sentencia = "INSERT INTO noticias (titulo,categoria,autor,fecha,url,img) VALUES ('$tituloNuevo','$categoriaNuevo','$autorNuevo','$fechaNuevo','$urlNuevo','$imgNuevo')";
                        header("Location: ./index.php");
                        // Después de esto se redirigirá automáticamente a Inicio
                    }
                }
            }else if($_SESSION['tipo'] == "Lector"){ // Si el tipo de usuario es de lector, saldrá un error de insuficiencia de permisos
                ?>      
                <div style="text-align:center">
                    <p style="color:white">No tienes permiso para estar aquí</p>
                    <a href="./index.php" style="color: black;background-color: white; border-radius: 1rem; padding: 0.2rem 0.8rem">Volver</a>
                </div>
            <?php
            }
        }else{
        ?>  <!-- Si el usuario no está registrado, también saldrá un error -->
            <div style="text-align:center">
                <p style="color:white">No tienes permiso para estar aquí</p>
                <a href="./index.php" style="color: black;background-color: white; border-radius: 1rem; padding: 0.2rem 0.8rem">Volver</a>
            </div>
        <?php
        }

        

        ?>
<script> // Funciones de actualizar e insertar noticia
    function noticiaActualizada(){
        window.alert("La noticia ha sido actualizada");
    }
    function noticiaInsertada(){
        window.alert("La noticia ha sido insertada");
    }
</script>
</body>
</html>