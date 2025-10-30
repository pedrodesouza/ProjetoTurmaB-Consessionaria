<?php
namespace Concessionaria\Projetob\Controller;

class Principal
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
        echo $this->ambiente->render("inicio.html");
    }

    public function login()
    {
        echo $this->ambiente->render("teste.html");
        
    }
    public function loginDuo()
    {
        echo $this->ambiente->render("teste.html");
    }
}
?>