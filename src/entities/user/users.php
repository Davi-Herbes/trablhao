<?php

require_once __DIR__ . "/../../../config/database/config.php";
require_once __DIR__ . "/../../../config/database/mysql.php";

class User
{
    public $username;
    public $email;
    public $passwordHash;



    public function __construct($username, $email, $passwordPlain)
    {
        $this->username = $username;
        $this->email = $email;
        $this->passwordHash = password_hash($passwordPlain, PASSWORD_BCRYPT);
    }

    public function save()
    {
        $conexao = new MySQL();
        // if (isset($this->id)) {
        //     $sql = "UPDATE users SET username = '{$this->username}' ,email = '{$this->email}', password_hash = '{$this->passwordHash}' WHERE id = {$this->id}";
        // } else {
        $sql = "INSERT INTO users (username,email,password_hash) VALUES ('{$this->username}','{$this->email}','{$this->passwordHash}')";
        // }
        return $conexao->executa($sql);
    }

    public static function find($id)
    {
        $conexao = new MySQL();
        $sql = "SELECT * FROM users WHERE id = '{$id}';";

        return $conexao->consulta($sql);
    }

    public static function findByEmail($email)
    {
        $conexao = new MySQL();
        $sql = "SELECT * FROM users WHERE email = '{$email}';";

        return $conexao->consulta($sql);
    }

    public static function findAll()
    {
        $conexao = new MySQL();
        $sql = "SELECT * FROM users;";

        return $conexao->consulta($sql);
    }

    public function delete($id)
    {
        $conexao = new MySQL();
        $sql = "DELETE users WHERE id='{$id}';";

        return $conexao->executa($sql);
    }
}
