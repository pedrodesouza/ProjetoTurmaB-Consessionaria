<?php
require_once __DIR__ . '/vendor/autoload.php';

// endereço do site
const URL = "http://localhost/ProjetoTurmaB-Consessionaria";
$roteador = new CoffeeCode\Router\Router(URL);
$roteador->namespace("Concessionaria\Projetob\Controller");

// rota principal
$roteador->group(null);
$roteador->get("/", "Principal:inicio");
$roteador->get("/proposta", "PropostaController:inicio");
$roteador->post("/proposta", "PropostaController:enviar");
// rotas de autenticação
$roteador->get("/login", "AuthController:showLoginForm");
$roteador->post("/login", "AuthController:login");
$roteador->get("/register", "AuthController:showRegisterForm");
$roteador->post("/register", "AuthController:register");
$roteador->post("/logout", "AuthController:logout");
// rota para detalhes do veículo
$roteador->group("/veiculos");
$roteador->get("/", "Principal:catalogo");
$roteador->get("/{id}", "VeiculosController:detalhes");
$roteador->get("/pesquisar", "VeiculosController:pesquisar");

$roteador->dispatch();
