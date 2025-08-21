<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once __DIR__ . "/../../src/entities/user/users.php";
    $email = $_POST["email"];
    $password = $_POST["password"];


    try {
        $user_search = User::findByEmail($email);


        if ($user_search) {
            $user_search = $user_search[0];

            $username = $user_search["username"];
            $email = $user_search["email"];
            $password_hash = $user_search["password_hash"];

            $user = new User($username, $email, $password);

            $password_accepted = password_verify($password, $password_hash);

            if ($password_accepted) {
                $_SESSION["user"] = $user;

                header("Location: /livros");
                exit;
            }

            $erro = "<h2 class=\"erro\">Usuário ou senha errado(s)</h1>";
        }

        $erro = "<h2 class=\"erro\">Usuário ou senha errado(s)</h1>";
    } catch (Exception $e) {

        $erro = "<h2 class=\"erro\">Ocorreu um erro</h1>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Digite seus dados</h1>

    <?php
    if (isset($erro)) {
        echo $erro;
    }
    ?>

    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Senha:</label>
        <input type="text" id="password" name="password" required>
        <br>
        <button type="submit" id="enviar">Entrar</button>
    </form>
</body>

</html>