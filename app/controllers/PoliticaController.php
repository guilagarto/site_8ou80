<?php

class PoliticaController {
    
    /**
     * Renderiza a página de Política de Privacidade
     */
    public function privacidade() {
        require_once __DIR__ . '/../views/politica.php';
    }

    /**
     * Renderiza a página de Termos de Uso
     */
    public function termos() {
        require_once __DIR__ . '/../views/termos.php';
    }
}
