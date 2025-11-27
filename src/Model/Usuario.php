<?php
namespace Concessionaria\Projetob\Model;

class Usuario
{
    public int $id;
    public string $nome;
    public string $email;
    public string $senha;
    public ?int $role;

    public function __construct()
    {
    }
}
