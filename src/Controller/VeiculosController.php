<?php
namespace Concessionaria\Projetob\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Concessionaria\Projetob\Model\Veiculos;
use Concessionaria\Projetob\Model\VeiculosRepository;
use Concessionaria\Projetob\Model\Database;

//feito por paulo henrique de oliveira benedicto e lucas sousa
class VeiculosController
{
    private Environment $ambiente;
    private VeiculosRepository $veiculosDados;
    private \PDO $conexao;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../View');
        $this->ambiente = new Environment($loader);
        $this->conexao = Database::getConexao();
        $this->veiculosDados = new VeiculosRepository($this->conexao);
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

    public function pesquisar($data)
    {
        $termo = $_GET['q'] ?? '';

        if (empty($termo)) {
            header("Location: /veiculos");
            exit;
        }

        $veiculos = $this->veiculosDados->buscarVeiculos($termo);

        echo $this->ambiente->render("veiculos/catalogo.html", [
            'veiculos' => $veiculos,
            'pesquisa' => $termo
        ]);
    }
}