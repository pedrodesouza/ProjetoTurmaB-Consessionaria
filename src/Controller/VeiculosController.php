<?php
namespace Concessionaria\Projetob\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
//feito por paulo henrique de oliveira benedicto
class VeiculosController
{
    private Environment $ambiente;
    private array $veiculos;

    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../View');
        $this->ambiente = new Environment($loader);

        //dados pre definidos para teste
        $this->veiculos = [
            1 => [
                'id' => 1,
                'marca' => 'Toyota',
                'modelo' => 'Corolla',
                'ano' => 2023,
                'preco' => 120000.00,
                'quilometragem' => 0,
                'combustivel' => 'Flex',
                'cor' => 'Preto',
                'cambio' => 'Automático',
                'final_placa' => '0',
                'descricao' => 'Veículo 0km, completo com todos opcionais de fábrica.',
                'imagem' => 'toyotacorolla.jpeg'
            ]
        ];
    }

    private function buscarVeiculoPorId(int $id): ?array
    {
        return $this->veiculos[$id] ?? null;
    }

    public function detalhes($data)
    {
        $id = (int) $data['id'];
        $veiculo = $this->buscarVeiculoPorId($id);

        if (!$veiculo) {
            //se o veículo não for encontrado, redireciona para a página principal
            header("Location: /");
            exit;
        }

        echo $this->ambiente->render("veiculos/detalhes.html", ['veiculo' => $veiculo]);
    }
}