<?php
    namespace Concessionaria\Projetob\Controller;
    use Concessionaria\Projetob\Model\Veiculos;
    use Concessionaria\Projetob\Model\Database;

class Principal
{
    private \Twig\Environment $ambiente;
    private \Twig\Loader\FilesystemLoader $carregador;
    private Veiculos $veiculosDados;

     public function __construct()
     {
        $this->carregador = new \Twig\Loader\FilesystemLoader("./src/View");
        $this->ambiente = new \Twig\Environment($this->carregador);
        
        $this->veiculosDados = new Veiculos();
     }  

     public function inicio()
    {
        session_start();
        $usuario = null;

        if (isset($_SESSION["user_id"])) {
            $usuario = Database::loadUserById($_SESSION["user_id"]);
        }
        $listaVeiculos = $this->veiculosDados->veiculosSelectAll();
        
        echo $this->ambiente->render("inicio.html", ['usuario' => $usuario, 'veiculos' => $listaVeiculos]);
    }

     public function catalogo()
    {
        session_start();
        $usuario = null;

        if (isset($_SESSION["user_id"])) {
            $usuario = Database::loadUserById($_SESSION["user_id"]);
        }
        $listaVeiculos = $this->veiculosDados->veiculosSelectAll();

        echo $this->ambiente->render("veiculos/catalogo.html", ['usuario' => $usuario, 'veiculos' => $listaVeiculos]);
    }
}
?>