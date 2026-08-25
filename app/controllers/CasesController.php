<?php
// app/controllers/CasesController.php

require_once __DIR__ . '/../config/database.php';

class CasesController {
    
    public function index() {
        $db = Database::conectar();
        
        $query = $db->query("SELECT id, badge, titulo, descricao, metrica, slug FROM cases ORDER BY id DESC");
        
        // 🛠️ CORREÇÃO DA FUNÇÃO PARA MYSQLI
        $meusCases = $query->fetch_all(MYSQLI_ASSOC); 

        require_once __DIR__ . '/../views/cases.php';
    }
}
