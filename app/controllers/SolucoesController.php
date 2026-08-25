<?php
// app/controllers/SolucoesController.php

require_once __DIR__ . '/../config/database.php';

class SolucoesController {
    
    public function index() {
        // 1. Conecta ao banco de dados
        $db = Database::conectar();
        
        // 2. Faz a query buscando os campos da sua tabela real
        $query = $db->query("SELECT id, titulo, descricao, icone, preco, ordem FROM solucoes ORDER BY ordem ASC");
        $todasSolucoes = $query->fetchAll();

        // 3. Inclui a view levando os dados salvos em $todasSolucoes
        require_once __DIR__ . '/../views/solucoes.php';
    }
}
