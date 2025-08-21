<?php
require_once __DIR__ . "/src/entities/user/users.php";

session_start();


if (!isset($_SESSION["user"])) {
    header("Location: pages/login");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./public/styles/home.css">
    <title>Home</title>
</head>

<body>
    <?php
    $user = $_SESSION["user"];
    ?>

    <div id="menu">
        <img src="./public/images/logo.svg" alt="logo">
        <h1>Biblioteca de livros</h1>
    </div>

    <div id="container">
        <h1>Bem vindo(a) <?php echo $user->username; ?></h1>

        <div id="titulo">
            <h2>Livros</h2>
        </div>


        <div id="livros">
            <h3>nome do livropapa</h3>
            <h3>nome do livropapa</h3>
            <h3>nome do livropapa</h3>
            <h3>nome do livropapa</h3>
            <h3>nome do livropapa</h3>
        </div>
    </div>
</body>

</html>