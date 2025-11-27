<?php
namespace Concessionaria\Projetob\Model;
use PDO;
use Concessionaria\Projetob\Model\Database;

class PropostaModel
{       
    private PDO $conexao;
    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }
    public function salvarProposta(Proposta $proposta)
    {
        

        $cSQL = $this->$conexao->prepare("INSERT INTO PROPOSTAS(VEICULO_ID, NOME_CLIENTE, EMAIL_CLIENTE, TIPO, DATA_PROPOSTA) VALUES(:veiculo, :nome, :email, :tipo, :data_proposta)");

        $cSQL->bindValue(":veiculo", $proposta->veiculo_id);
        $cSQL->bindValue(":nome", $proposta->nome_cliente);
        $cSQL->bindValue(":email", $proposta->email_cliente);
        $cSQL->bindValue(":tipo", $proposta->tipo);
        $cSQL->bindValue(":data", $proposta->data_proposta);

        $conexao->exec($cSQL); 
    }
}