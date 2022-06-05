<?php
    $conn = new mysqli('172.16.0.2', 'root', '1234', 'mysitedb');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    session_start();
    if (empty($_SESSION["user_id"])) {
        header ("Location: login.php");
    } else {
        $user_id = $_SESSION["user_id"];
    }
    
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $query = 'DELETE FROM tCard WHERE id = '.$id;
        if ($conn->query($query) === FALSE) {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
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
                <a href="main.php" style="text-decoration: none"><h2>make<span>it</span>known</h2></a>
                </div>
                <ul class="links">
                    <li class="link"><a href="main.php">¿Qué está perdido?</a></li>
                    <li class="link"><a href="contributions.php">Mis aportaciones</a></li>
                    <li class="link"><a href="do_logout.php" class="logout">Cerrar sesión</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="cardView">
        <div class="card">
            <a href="create_contributions.php" class="face front2 create">
                <img src="./static/create.png" alt="">
                <h3>Crear</h3>
            </a>
        </div>
        <?php
            // Lanzar una query
            $query = 'SELECT * FROM tCard WHERE user_id = '.$user_id.' ORDER BY publication_date DESC';
            // $query = 'SELECT * FROM tCard WHERE user_id = 2 ORDER BY publication_date DESC';
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
                            <form action="contributions.php" method="post">
                                <input type="hidden" name="id" value="'.$row['id'].'">
                                <input class="deleteButton" name="submit" type="submit" value="Eliminar">
                            </form>
                        </div>
                    </div>';
            }
        $conn->close();
    ?>
    <div>
    <script src="./menu.js"></script>
</body>
</html>