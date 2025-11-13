<?php
namespace Concessionaria\Projetob\Model;

class Notas_fiscais
{
    public int $id_nota;
    public int $id_compra;
    public string $data_emissao;
    public string $valor_total;
    public string $num_nota;
    public int $id_pedido;
    public int $id_itnf;
       
}