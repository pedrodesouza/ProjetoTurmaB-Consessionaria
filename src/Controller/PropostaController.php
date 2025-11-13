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
        echo $this->ambiente->render("propostas/proposta.html");
    } 
    
    public function enviar()
    {
        header("https://formspree.io/f/mbljrnkp");
    }
}
?>
