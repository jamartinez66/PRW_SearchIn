<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./contacto.css">
    <title>Search-In: Contacto</title>
</head>
<body>
    <div id="contenido">
        <div id="cuadro">
            <div class="encabezado1"><!-- Cabecera  -->
                <p style="text-decoration: underline">Contacto</p>
                <p style="font-size: 1rem">Rellene el campo de su correo y pulse enviar para contactar con nosotros:</p>
            </div>
            <div id="central"><!-- Formulario para insertar el correo y enviarlo posteriormente -->
                <form action="mailto:josearidane@gmail.com" method="GET">
                    <input type="text" id="nombre" name="email" value="" placeholder="Introduce tu email">
               
                <div id="botones"><!-- Botones de navegación  -->
                    <input type="submit" id="enviar" name="enviar" value="Enviar Email">
                    <a href="./index.php" id="inicio">Inicio</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>