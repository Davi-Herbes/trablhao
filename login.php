<?php 
// if(); com o bgl dentro sei la
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
    <form action="index.php" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="senha">Senha:</label>
    <input type="text" id="senha" name="senha" required>
    <br>
    <button type="submit" id="enviar">Entrar</button>
    </form>
</body>
</html>