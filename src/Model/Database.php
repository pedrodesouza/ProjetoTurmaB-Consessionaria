<?php
namespace  Concessionaria\Projetob\Model;

use USUARIOS;

class Database
{
    private \PDO $conexao;

    public function __construct()
    {
        $this->conexao = new \PDO("mysql:host=localhost;dbname=dbSistema", "root", "");
    }

function loadUserById(int $id): ?USUARIOS
    {
        $stmt = $this->conexao->prepare("SELECT id, nome, email, senha FROM USUARIOS WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $usuario = $stmt->fetchObject(USUARIOS::class);
        if ($usuario && password_verify($senha, $usuario->senha)) {
            return $usuario;
        }

        return null;
    }
}