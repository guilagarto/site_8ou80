<?php
// app/controllers/CasesController.php

require_once __DIR__ . '/../config/database.php';

class CasesController {
    
    public function index() {
        $db = Database::conectar();
        
        $query = $db->query("SELECT id, badge, titulo, descricao, metrica, slug FROM cases ORDER BY id DESC");
        
        // 🛠️ PARSER COMPATÍVEL: Varre o objeto independente do driver ativo do servidor
        $meusCases = [];
        if ($query) {
            foreach ($query as $row) {
                $meusCases[] = $row;
            }
        }

        require_once __DIR__ . '/../views/cases.php';
    }
}
