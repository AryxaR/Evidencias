<?php
session_start();
if (empty($_SESSION['id'])) {
    header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div class="titulo">
        <h1>Hola
            <?php echo $_SESSION['user']; ?>
        </h1>
    </div>
    <div class="exit">
        <a href="../settings/logout.php">Salir</a>
    </div>

</body>

</html>