<?php
namespace Concessionaria\Projetob\Model;

class Proposta
{
public int $id;
public int $veiculo_id;
public string $nome_cliente;
public string $email_cliente;
public string $tipo;
public date $data_proposta;
}