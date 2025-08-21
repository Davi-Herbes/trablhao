<?php
require_once __DIR__ . "/../../../config/database/config.php";
require_once __DIR__ . "/../../../config/database/mysql.php";

class Livro
{
    private $titulo;
    private $autor;
    private $ano_publicacao;
    private $genero;


    private int $id;

    public function __construct($titulo, $autor, $ano_publicacao, $genero)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ano_publicacao = $ano_publicacao;
        $this->genero = $genero;
    }

    public function save()
    {
        $conexao = new MySQL();
        if (isset($this->id)) {
            $sql = "UPDATE livros SET titulo = '{$this->titulo}', autor = '{$this->autor}', ano_publicacao = '{$this->ano_publicacao}', genero = '{$this->genero}'  WHERE id = {$this->id}";
        } else {
            $sql = "INSERT INTO livros (titulo, autor, ano_publicacao, genero) VALUES ('{$this->titulo}','{$this->autor}','{$this->ano_publicacao}','{$this->genero}')";
        }
        return $conexao->executa($sql);
    }


    public static function find($id)
    {
        $conexao = new MySQL();
        $sql = "SELECT * FROM livros WHERE id = '{$id}';";

        return $conexao->executa($sql);
    }

    public static function findAll()
    {
        $conexao = new MySQL();
        $sql = "SELECT * FROM livros;";

        return $conexao->executa($sql);
    }

    public function delete($id)
    {
        $conexao = new MySQL();
        $sql = "DELETE livros WHERE id='{$id}';";

        return $conexao->executa($sql);
    }
}
