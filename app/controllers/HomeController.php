<?php

class HomeController {
    public function index() {
        // Aqui você pode chamar o Model no futuro para buscar dados
        require_once '../app/views/home.php';
    }

    public function sobre() {
        require_once '../app/views/sobre.php';
    }
}
