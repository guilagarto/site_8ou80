<?php
// app/controllers/CasesController.php

require_once __DIR__ . '/../config/database.php';

class CasesController {
    
    public function index() {
        $db = Database::conectar();
        
        $query = $db->query("SELECT id, badge, titulo, descricao, metrica, slug FROM cases ORDER BY id DESC");
        
        // 🛠️ LOGICA UNIVERSAL: Compatível com XAMPP (PDO) e Web (MySQLi)
        $meusCases = [];
        while ($row = $query->fetch()) {
            $meusCases[] = $row;
        }

        require_once __DIR__ . '/../views/cases.php';
    }
}
