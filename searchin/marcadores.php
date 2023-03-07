<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./marcadores.css">
    <title>Search-In: Marcadores</title>
</head>
<body>  

    <?php
        session_start();  
        require "./conexion.php";
        require "./metodos.php";
        
        if(isset($_SESSION['usuario'])){
           
        
            if(isset($_SESSION['hecho'])){
                if($_SESSION['hecho'] == "no"){ // Si la variable salir es NO, se muestra el formulario.

                    $usuario = $_SESSION['usuario'];

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

                    ?>
                    <div id="central">   
                        <form id="formulario" method="POST" action="#" name="enviar">
                            <p id="titulo">Marcadores:</p>
                            <div id="contenido">
                                <div class="textos">
                                    <p id="marcador">Marcador 1:</p>
                                    <p id="marcador">Marcador 2:</p>
                                    <p id="marcador">Marcador 3:</p>
                                    <p id="marcador">Marcador 4:</p>
                                    <p id="marcador">Marcador 5:</p>
                                </div>
                                <div class="inputs">
                                    <input type="text" name="marcador1nombre" class="cajaTexto" value="<?php echo $marcador1nombre; ?>" placeholder="Nombre del sitio web">
                                    <input type="text" name="marcador1url" class="cajaTexto" value="<?php echo $marcador1url; ?>" placeholder="URL">
                                    <input type="text" name="marcador2nombre" class="cajaTexto" value="<?php echo $marcador2nombre; ?>" placeholder="Nombre del sitio web">
                                    <input type="text" name="marcador2url" class="cajaTexto" value="<?php echo $marcador2url; ?>" placeholder="URL">
                                    <input type="text" name="marcador3nombre" class="cajaTexto" value="<?php echo $marcador3nombre; ?>" placeholder="Nombre del sitio web">
                                    <input type="text" name="marcador3url" class="cajaTexto" value="<?php echo $marcador3url; ?>" placeholder="URL">
                                    <input type="text" name="marcador4nombre" class="cajaTexto" value="<?php echo $marcador4nombre; ?>" placeholder="Nombre del sitio web">
                                    <input type="text" name="marcador4url" class="cajaTexto" value="<?php echo $marcador4url; ?>" placeholder="URL">
                                    <input type="text" name="marcador5nombre" class="cajaTexto" value="<?php echo $marcador5nombre; ?>" placeholder="Nombre del sitio web">
                                    <input type="text" name="marcador5url" class="cajaTexto" value="<?php echo $marcador5url; ?>" placeholder="URL">
                                </div>
                            </div>
                         
                        <input type="submit" id="boton" name="enviar" value="Enviar">
                        <a href="./index.php" id="botonEnviar">Inicio</a> 
                        </form> 
                        <?php
                        if(isset($_POST['enviar'])){
                            if($_POST['enviar'] == "Enviar"){
                                $_SESSION['hecho'] = "si";

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
                                
                                $objeto = new metodos();
                                $objeto->actualizarMarcadores($marcador1nombre,$marcador1url,$marcador2nombre,$marcador2url, $marcador3nombre,$marcador3url,$marcador4nombre,$marcador4url,$marcador5nombre,$marcador5url,$usuario);
                                ?>
                                <?php header("refresh: 0;");
                            }
                        }
                        ?>
                    </div>

                    <?php



                }else{ // Si la variable salir es SI, se muestra la pantalla de enviado.
                    
                    ?>
                    
                    <div id="cortina">
                        <div id="cuadro">
                            <div id="cuadroMensaje">
                                <div id="mensaje">
                                    <span style="margin-top:0.2rem;">Se han actualizado los marcadores. Redirigiendo</span>
                                    <img src='./imgs/loading.svg' style='width: 1.8rem;'></img>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    $_SESSION['hecho'] = "no";
                    header("refresh: 2; url= ./index.php");
                }
            }
        }else{
            ?>
            <div id="cortina">
                <div id="cuadro">
                    <div id="cuadroMensaje">
                        <div id="mensaje">
                            <span style="margin-top:0.2rem;">No tienes permiso para estar aqui. Redirigiendo</span>
                            <img src='./imgs/loading.svg' style='width: 1.8rem;'></img>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            header("refresh: 2; url= ./index.php");
        }
    ?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script>
    $(".cajaTexto").click(function () {
        if($(this).val() == "URL"){
            $(this).val("");
        }else if($(this).val() == "Favorito"){
            $(this).val("");
        }
    })
</script>
</body>
</html>