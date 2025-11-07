<?php

namespace Concessionaria\Projetob\Model;

class Compra
{
    public int $id_compra;
    public string $data_compra;
    public string $valor_compra;	
    public int $id_fornecedor;	
    public string $forma_pagamento;
    public string $venda_compra;
    public int $id_pedido;
    public int $id_estoque;
}