<?php
// app/controllers/BlogController.php

require_once __DIR__ . '/../config/database.php';

class BlogController {
    
    public function index() {
        $db = Database::conectar();
        
        $query = $db->query("SELECT id, categoria, titulo, resumo, slug, publicado_em FROM posts ORDER BY id DESC");
        
        // 🛠️ LOGICA UNIVERSAL: Lê os dados linha por linha de forma compatível com PDO e MySQLi
        $meusPosts = [];
        while ($row = $query->fetch()) {
            $meusPosts[] = $row;
        }

        require_once __DIR__ . '/../views/blog.php';
    }

    public function post() {
        require_once __DIR__ . '/../views/post.php';
    }
}
