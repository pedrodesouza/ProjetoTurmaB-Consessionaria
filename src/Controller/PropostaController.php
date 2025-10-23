<?php
namespace Concessionaria\Projetob\Controller;
use Concessionaria\Projetob\Model\Proposta;

class PropostaController
{
     private \Twig\Environment $ambiente;
     private \Twig\Loader\FilesystemLoader $carregador;

     public function __construct()
     {
        $this->carregador = new \Twig\Loader\FilesystemLoader("./src/View");
 
        $this->ambiente = new \Twig\Environment($this->carregador);
     }  

     public function inicio()
    {
        echo $this->ambiente->render("proposta.html");
    } public function enviar()
    {
        $bd = new PropostaModel();
        $bd->salvarProposta();
        header("https://formspree.io/f/mbljrnkp");
    }
}
?>