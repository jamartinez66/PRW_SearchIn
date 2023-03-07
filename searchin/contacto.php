<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/contactar.css">
    <title>Search-In: Contacto</title>
</head>
<body>
    <div id="contenido">
        <div id="cuadro">
            <div id="central"><!-- Formulario para insertar el correo y enviarlo posteriormente -->
                <form action="enviar.php" method="post">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="telefono">Número de teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>

                    <label for="motivo">Motivo:</label>
                    <textarea id="motivo" name="motivo" required></textarea>

                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>