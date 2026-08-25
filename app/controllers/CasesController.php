<?php
// app/controllers/CasesController.php

// 📂 CAMINHO CORRIGIDO: Aponta para a pasta 'config'
require_once __DIR__ . '/../config/database.php';

class CasesController {
    
    public function index() {
        // 1. Abre a conexão com o banco
        $db = Database::conectar();
        
        // 2. Executa a query para buscar os registros de sucesso ordenando pelos mais recentes
        $query = $db->query("SELECT id, badge, titulo, descricao, metrica, slug FROM cases ORDER BY id DESC");
        $meusCases = $query->fetchAll();

        // 3. Renderiza a View levando os dados dinâmicos do banco
        require_once __DIR__ . '/../views/cases.php';
    }
}
