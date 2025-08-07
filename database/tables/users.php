<?php
require_once __DIR__."/../config.php";
require_once __DIR__."/../mysql.php";

class User {
    private $username;
    private $email;
    private $passwordHash;

    
    private int $id;

    public function __construct($username, $email, $passwordPlain) {
        $this->username = $username;
        $this->email = $email;
        $this->passwordHash = password_hash($passwordPlain, PASSWORD_BCRYPT);
    }

    public function save() {
        $conexao = new MySQL();
        if(isset($this->id)){
            $sql = "UPDATE users SET username = '{$this->username}' ,email = '{$this->email}', password_hash = '{$this->passwordHash}' WHERE id = {$this->id}";
        }else{
            $sql = "INSERT INTO users (nome,email) VALUES ('{$this->username}','{$this->email}', password_hash = '{$this->passwordHash}')";
        }
        return $conexao->executa($sql);
    }
    
}
?>
