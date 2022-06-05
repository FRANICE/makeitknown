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
    <title>Main</title>
</head>
<body>
    <div class="menu">
        <nav>
            <div class="contenedor">
                <div class="toggle">
                    |||
                </div>
                <div class="contenedor-logo">
                    <a href="main.php" style="text-decoration: none"><h2>make<span>it</span>known</h2></a>
                </div>
                <ul class="links">
                    <li id="MenuOp1" class="link"><a href="main.php">¿Qué está perdido?</a></li>
                    <li id="MenuOp2" class="link"><a href="contributions.php">Mis aportaciones</a></li>
                    <li id="MenuOp3" class="link"><a href="#" class="logout">Cerrar sesión</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="cardView">
    <?php
        // Lanzar una query
        $query = 'SELECT * FROM tCard ORDER BY publication_date DESC';
        $result = $conn->query($query);

        // Recorrer el resultado
        while($row = $result->fetch_assoc()) {
            echo '<div class="card">
                    <div class="face front">
                        <img src="'.$row['picture'].'" alt="">
                        <h3>'.$row['title'].'</h3>
                    </div>
                    <div class="face back">
                        <h3>'.$row['title'].'</h3>
                        <p>'.$row['description'].'</p>
                        <div class="link">
                            <span>Publicado el: '.$row['publication_date'].'</nombre></span>
                        </div>
                    </div>
                </div>';
        }
        $conn->close();
    ?>
    </div>
    <script src="./menu.js"></script>
</body>
</html>
