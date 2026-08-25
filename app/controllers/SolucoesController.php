<?php
// app/controllers/SolucoesController.php

require_once __DIR__ . '/../config/database.php';

class SolucoesController {
    
    public function index() {
        $db = Database::conectar();
        
        $query = $db->query("SELECT id, titulo, descricao, icone, preco, ordem FROM solucoes ORDER BY ordem ASC");
        
        // 🛠️ LOGICA UNIVERSAL: Compatível com XAMPP (PDO) e Web (MySQLi)
        $todasSolucoes = [];
        while ($row = $query->fetch()) {
            $todasSolucoes[] = $row;
        }

        require_once __DIR__ . '/../views/solucoes.php';
    }
}
