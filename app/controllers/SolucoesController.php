<?php
// app/controllers/SolucoesController.php
require_once __DIR__ . '/../models/Solucao.php';

class SolucoesController {
    
    public function index() {
        // 1. Puxa a lista de serviços do banco de dados através do Model
        $lista_solucoes = Solucao::listarTodas();
        
        // 2. Carrega a view entregando o array $lista_solucoes para o HTML
        require_once __DIR__ . '/../views/solucoes.php';
    }
}
