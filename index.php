<?php
$nombre = "";
$edad = 0;
$hobby = "";
$mensaje = "";
$respuesta = false;
$saludo = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre = htmlspecialchars($_POST["name"]);
    $edad = htmlspecialchars($_POST["age"]);
    $hobby = htmlspecialchars($_POST["hobby"]);
    $respuesta = true;

    if ($edad > 50) {
        $mensaje = "Usted tiene un perfil de senior developer.";
    } else if ($edad > 30) {
        $mensaje = "Usted tiene un perfil de intermediate developer.";
    } else if ($edad > 20) {
        $mensaje = "Usted tiene un perfil de junior developer.";
    } else {
        $mensaje = "Usted tiene un perfil de trainee.";
    }
}
else if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $saludo = htmlspecialchars($_GET["saludo"]);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>
    <main>
        <form method="post" action="index.php">
            <label for="name">Nombre</label><br>
            <input type="text" name="name" id="form-name"><br>
            <label for="age">Edad</label><br>
            <input type="number" min="1" max="120" name="age" id="form-age"><br>
            <label for="hobby">Hobby</label><br>
            <input type="text" name="hobby" id="form-hobby"><br>
            <input type="submit" value="Confirmar">
        </form>
        <?php if ($respuesta): ?>
        <div class="tarjeta">
            <h1>Tu información</h1><br>
            <h2>Nombre:</h2>
            <p id="tarjeta-nombre"><?php echo $nombre ?></p>
            <h2>Edad:</h2>
            <p id="tarjeta-edad"><?php echo $edad ?></p>
            <h2>Hobby:</h2>
            <p id="tarjeta-hobby"><?php echo $hobby ?></p>
            <p id="tarjeta-mensaje"><?php echo $mensaje ?></p>
        </div>
        <?php endif; ?>
        <?php if ($saludo != ""): ?>
            <div id="saludo">
                <h1>Mensaje del cliente</h1>
                <p><?php echo $saludo ?></p>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>