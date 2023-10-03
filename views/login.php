<?php 
    if (isset($_POST['sing'])){
        header('location: newUser.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="container">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <h1>Login</h1>
            <?php include('../settings/loginController.php'); ?>
            <div class="input">
                <input type="text" name="user" placeholder="User Name">
            </div>
            <div class="input">
                <input type="password" name="pass" placeholder="Password">
            </div>
            <input class="btn login" type="submit" value="Login" name="login">
            <div class="singup">
                <p>Don´t have account?</p>
                <input class="btn sing" type="submit" value="Sign up" name="sing">
            </div>
        </form>  
    </div>
   
</body>
</html>