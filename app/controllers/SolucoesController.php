<?php
// app/controllers/SolucoesController.php

require_once __DIR__ . '/../config/database.php';

class SolucoesController {
    
    public function index() {
        $db = Database::conectar();
        
        // Executa a query usando a sintaxe nativa do MySQLi
        $query = $db->query("SELECT id, titulo, descricao, icone, preco, ordem FROM solucoes ORDER BY ordem ASC");
        
        // 🛠️ CORREÇÃO DA FUNÇÃO PARA MYSQLI
        $todasSolucoes = $query->fetch_all(MYSQLI_ASSOC); 

        require_once __DIR__ . '/../views/solucoes.php';
    }
}
