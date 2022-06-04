<?php

$target_dir = "assets/";
$item_uploaded = false;
// $user_id_to_insert = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $target_file = $target_dir . basename($_FILES["file"]["tmp_name"]);
    $title = htmlentities($_POST['title'], ENT_QUOTES);
    $description = htmlentities($_POST['description'], ENT_QUOTES);

    $conn = new mysqli('172.16.0.2', 'root', '1234', 'mysitedb');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $query = 'INSERT INTO tCard (picture, title, `description`, publication_date, user_id) VALUES ("'.$target_file.'", "'.$title.'", "'.$description.'", NOW(), 2)';

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        if ($conn->query($query) === TRUE) {
            $item_uploaded = true;
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
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
    <title>Create contributions</title>
    <?php
        if ($item_uploaded) {
            echo "<script>alert('Ok')</script>";
            header("Location: contributions.php");
        }
    ?>
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
                    <li class="link"><a href="main.php">¿Qué está perdido?</a></li>
                    <li class="link"><a href="contributions.php">Mis aportaciones</a></li>
                    <li class="link"><a href="#">Cerrar sesión</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <form action="create_contributions.php" class="cardView" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="face front2 create">
                <div class="custom-input">
                    <input type="file" name="file" id="fileToUpload" class="custom-file-input" required>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="face back2 create">
                <input type="text" name="title" placeholder="Añadir título" class="create1" required></input>
                <input type="text" name="description" placeholder="Añadir descripción" class="create2" required></input>
                <div>
                    <div>
                        <input type="submit" name="submit" value="Publicar" class="createButton">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="./menu.js"></script>
</body>
</html>