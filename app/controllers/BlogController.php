<?php
// app/controllers/BlogController.php

// 📂 CAMINHO CORRIGIDO: Aponta para a pasta 'config'
require_once __DIR__ . '/../config/database.php';

class BlogController {
    
    public function index() {
        $db = Database::conectar();
        
        // Faz a query buscando os posts cadastrados
        $query = $db->query("SELECT id, categoria, titulo, resumo, slug, publicado_em FROM posts ORDER BY id DESC");
        $meusPosts = $query->fetchAll();

        require_once __DIR__ . '/../views/blog.php';
    }

    public function post() {
        require_once __DIR__ . '/../views/post.php';
    }
}
