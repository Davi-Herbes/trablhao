<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
</body>
    <h1 id="nomelivro">livro1</h1>
    <h1 id="nomelivro">livro2</h1>
    <h1 id="nomelivro">livro3</h1>
<?php
    
    require_once __DIR__."/database/tables/users.php";

    $user = new User("teste", "teste@email.com", "123345");
    $user->save();
?>
</body>
</html>
