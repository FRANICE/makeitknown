<?php
    $conn = new mysqli('172.16.0.2', 'root', '1234', 'mysitedb');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>

<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style2.css">
    <title>Create contributions</title>
</head>
<body>
    <div class="menu">
        <nav>
            <div class="contenedor">
                <div class="toggle">
                    |||
                </div>
                <div class="contenedor-logo">
                    <h2>make<span>it</span>known</h2>
                </div>
                <ul class="links">
                    <li class="link"><a href="#">¿Qué está perdido?</a></li>
                    <li class="link"><a href="#">Mis aportaciones</a></li>
                    <li class="link"><a href="#">Cerrar sesión</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <form action="#" class="cardView">
        <div class="card">
            <div class="face front2 create">
                <div class="custom-input">
                    <input type="file" name="fileToUpload" id="fileToUpload" class="custom-file-input">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="face back2 create">
                <input type="text" placeholder="Añadir título" class="create1"></input>
                <input type="text" placeholder="Añadir descripción" class="create2"></input>
                <div>
                    <div>
                        <input type="submit" value="Publicar" class="createButton" action="deleteCard.php" method="delete"></input>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="./menu.js"></script>
</body>
</html>