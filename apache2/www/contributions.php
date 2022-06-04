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
    <title>Contributions</title>
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
    <div class="cardView">
        <div class="card">
            <a href="http://localhost:8085/create_contributions.php" class="face front2 create">
                <img src="./static/create.png" alt="">
                <h3>Crear</h3>
            </a>
        </div>
        <?php
            // Lanzar una query
            // $query = 'SELECT * FROM tCard WHERE id_user = '.$_SESSION['id_user'];
            $query = 'SELECT * FROM tCard WHERE user_id = 1';
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
                            <div>
                                <button class="deleteButton" action="deleteCard.php" method="delete"><span>Eliminar</span></button>
                            </div>
                        </div>
                    </div>';
            }
        $conn->close();
    ?>
    <div>
    <script src="./menu.js"></script>
</body>
</html>