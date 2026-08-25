<?php
// app/controllers/BlogController.php

require_once __DIR__ . '/../config/database.php';

class BlogController {
    
    // Lista todos os posts no feed
    public function index() {
        $db = Database::conectar();
        $query = $db->query("SELECT id, categoria, titulo, resumo, slug, publicado_em FROM posts ORDER BY id DESC");
        
        $meusPosts = [];
        if ($query) {
            foreach ($query as $row) {
                $meusPosts[] = $row;
            }
        }

        require_once __DIR__ . '/../views/blog.php';
    }

    // Carrega um único post de forma dinâmica
    public function post() {
        // 1. Captura e limpa o slug vindo da URL amigável
        $slug = filter_input(INPUT_GET, 'slug', FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$slug) {
            // Se não informou o slug, joga direto na tela de erro 404
            http_response_code(404);
            require_once __DIR__ . '/../views/404.php';
            return;
        }

        $db = Database::conectar();
        
        // 2. Executa a query buscando o artigo exato através do slug
        $query = $db->query("SELECT titulo, categoria, resumo, conteudo_completo, publicado_em FROM posts WHERE slug = '{$slug}' LIMIT 1");
        
        // Desempacota o resultado de forma compatível com os dois ambientes
        $artigoCompleto = null;
        if ($query) {
            foreach ($query as $row) {
                $artigoCompleto = $row;
            }
        }

        // 3. SE O ARTIGO NÃO EXISTIR NO BANCO: Dispara automaticamente o Erro 404
        if (!$artigoCompleto) {
            http_response_code(404);
            require_once __DIR__ . '/../views/404.php';
            return;
        }

        // 4. Se encontrou, renderiza a tela interna de leitura
        require_once __DIR__ . '/../views/post.php';
    }
}
