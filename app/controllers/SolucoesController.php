<?php
// app/controllers/SolucoesController.php

require_once __DIR__ . '/../config/database.php';

class SolucoesController {
    
    public function index() {
        $db = Database::conectar();
        
        $query = $db->query("SELECT id, titulo, descricao, icone, preco, ordem FROM solucoes ORDER BY ordem ASC");
        
        // 🛠️ PARSER COMPATÍVEL: Extrai a matriz de dados de forma universal para PDO e MySQLi
        $todasSolucoes = [];
        if ($query) {
            foreach ($query as $row) {
                $todasSolucoes[] = $row;
            }
        }

        require_once __DIR__ . '/../views/solucoes.php';
    }
}
