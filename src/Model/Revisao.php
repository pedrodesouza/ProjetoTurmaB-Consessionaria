<?php
namespace Concessionaria\Projetob\Model;

class Revisao
{
    public int $ID_REVISAO;
    public string $DATA_REVISAO;
    public string $DATA_AGENDAMENTO;
    public int $KM_VEICULO;
    public int $PROXIMA_REVISAO_KM;
    public string $PROXIMA_REVISAO_DATA;
    public string $VALOR_TOTAL;
    public string $OBSERVACOES;
    public string $STATUS_VEICULO;
    public int $ID_CLIENTES;
    public int $ID_VEICULO;


}