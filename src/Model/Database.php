<?php
namespace  Concessionaria\Projetob\Model;

use USUARIOS;

class Database
{
    private \PDO $conexao;

    public function __construct()
    {
        $this->conexao = new \PDO("mysql:host=localhost;dbname=PRJ2DSB", "Aluno2DS", "SenhaBD2");
    }


    function loadUserById(int $id): ?USUARIOS
{
    $stmt = $this->conexao->prepare("SELECT id, nome, email, senha FROM USUARIOS WHERE id = :id"); //crie uma query para procurar o id
    $stmt->bindValue(":id", $id, PDO::PARAM_INT); //substitui o valor 
    $stmt->execute(); //executa

    $usuario = $stmt->fetchObject(USUARIOS::class); //transforma o resultado da consulta em um objeto da classe USUARIOS com os dados do banco

    if ($usuario) { //se existir o usuário retorna o usuário
        return $usuario;
    }

    return null;
}
}