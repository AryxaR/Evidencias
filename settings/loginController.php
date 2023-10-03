<?php
session_start();
include('db.php');

if (isset($_POST['login'])){
    if (!empty($_POST['user']) && !empty($_POST['pass'])){

        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $log = "SELECT * FROM admins WHERE user = '$user' AND password='$pass'";
        $result = mysqli_query($cn,$log);

        if ($data = $result -> fetch_object()){
            $_SESSION['id'] = $data -> id;
            $_SESSION['user'] = $data -> user;
            header('Location: ../views/index.php');
        } else {
            echo "<div class='acces'>Acceso Denegado</div>";
        }
    } else {
        echo "<p>Campos vacios</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .acces {
            color: red;
            font-size: 19px;
            display: flex;
            justify-content: center;            
        }
    </style>
</head>
<body>
    
</body>
</html>