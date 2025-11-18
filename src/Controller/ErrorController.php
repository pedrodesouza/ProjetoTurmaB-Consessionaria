<?php

namespace Concessionaria\Projetob\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ErrorController
{
    private Environment $ambiente;
    private FilesystemLoader $carregador;

    public function __construct()
    {
        $this->carregador = new FilesystemLoader($_ENV['TWIG_VIEW_PATH']);
        $this->ambiente = new Environment($this->carregador);
    }

    public function notFound(): void
    {
        http_response_code(404);
        echo $this->ambiente->render("404.html");
    }
}