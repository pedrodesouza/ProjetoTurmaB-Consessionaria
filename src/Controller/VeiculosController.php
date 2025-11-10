<?php
namespace Concessionaria\Projetob\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Concessionaria\Projetob\Model\Veiculos;

//feito por paulo henrique de oliveira benedicto e lucas sousa
class VeiculosController
{
    private Environment $ambiente;
    private Veiculos $veiculosDados;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../View');
        $this->ambiente = new Environment($loader);
        
        $this->veiculosDados = new Veiculos();
    }

    public function detalhes($data)
    {
        $id = (int) $data['id'];
        $veiculo = $this->veiculosDados->veiculosDetalhes($id);

        if (!$veiculo) {
            //se o veículo não for encontrado, redireciona para a página principal
            header("Location: /");
            exit;
        }
        // se tiver a galeria de imagens no banco de dados, vai ser usada nos detalhes do veículo
        $galeria = $this->veiculosDados->galeriaImagens($id);
        
        echo $this->ambiente->render("veiculos/detalhes.html", ['veiculo' => $veiculo, 'galeria' => $galeria]);
    }
}