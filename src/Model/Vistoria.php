<?php
namespace Concessionaria\Projetob\Model;

class Vistoria
{
    public string $ID_VISTORIA;
    public string $DATA_VISTORIA;
    public int $km_veiculo;
    public string $condicao_geral;
    public int $documentacao_ok;
    public string $observacoes;
    public int $ID_VEICULO;
    public int $ID_CLIENTES;
}
