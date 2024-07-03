<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Yashin V.S</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 form-align">
                <h1>Авторизация</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="login.php" class="form-align" method="POST">
                    <div class="row form-reg"><input type="text" class="form" name="login" placeholder="Login" ></div>
                    <div class="row form-reg"><input type="password" class="form" name="password" placeholder="Password"></div>
                    <button type="submit" class="btn_post" name="submit">Войти</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
require_once "db.php";

if (isset($_COOKIE['User'])) {
    header('Location: profile.php');
}
$link = mysqli_connect("db","root","root","exam");

if (isset($_POST["submit"])) {
    $password = $_POST["password"];
    $login = $_POST["login"];

    if (!$password || !$login) {
        die("Please enter correct data");
    }
    $sql = "select * from users where username='$login' and pass='$password'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) == 1) {
        setcookie("User", $login, time() + 7200,"/");
        header("Location: profile.php");
    } else {
        echo "Incorrect user data";
    }
}

?>