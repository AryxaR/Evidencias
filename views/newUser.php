<?php
include('../settings/db.php');
if (isset($_POST['record'])) {
    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
        $newUser = $_POST['user'];
        $newPass = $_POST['pass'];
        $query = "INSERT INTO admins (user, password) VALUES ('$newUser', '$newPass')";
        $resultado = mysqli_query($cn, $query);

        header('location: login.php');
    } else {
        echo "<script>alert('Todos los campos son obligatorios');</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/user.css">
</head>

<body>
    <div class="record">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <h2>New Admin</h2>
            <input class="campos" type="text" name="user" placeholder="Use Name">
            <input class="campos" type="password" name="pass" placeholder="Password">
            <input class="btn" type="submit" name="record" placeholder="Create">
            <a href="login.php">Regresar</a>
        </form>
    </div>
</body>

</html>