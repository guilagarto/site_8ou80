<?php
// 1. INTELIGÊNCIA DE AMBIENTE: Detecta se o projeto está rodando em Localhost ou Produção Online
$isLocal = ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_ADDR'] === '127.0.0.1');

// 2. CONFIGURAÇÃO DE PREFIXOS: Ajusta os caminhos automaticamente para não quebrar os links
if ($isLocal) {
    // No seu computador (XAMPP Local), mantém a pasta do projeto e o prefixo da pasta pública
    $base_url = '/8ou80-marketing';
    $css_path = '/8ou80-marketing/public/assets/css/style.css';
} else {
    // No servidor online (8ou80.com), o domínio aponta direto para a raiz pública
    // Nota: Se a sua hospedagem exigir a pasta /public na URL para o CSS, mantenha '/public/assets/css/style.css'
    $base_url = ''; 
    $css_path = '/assets/css/style.css'; 
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Título profissional alinhado à estratégia de Branding da marca -->
    <title>8ou80 Soluções Digitais | Da ideia ao resultado</title>
    
    <!-- Importação das fontes modernas de alta legibilidade (Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Link do arquivo CSS dinâmico e à prova de falhas -->
    <link rel="stylesheet" href="<?php echo $css_path; ?>">
</head>
<body>
    <header class="main-header">
        <nav class="nav-container">
            <!-- Logo dinâmico apontando para a raiz correta de cada ambiente -->
            <a href="<?php echo $base_url; ?>/" class="brand-logo">8ou80</a>
            
            <!-- Menu superior totalmente responsivo e com caminhos amigáveis automatizados -->
            <div class="nav-menu">
                <a href="<?php echo $base_url; ?>/">Início</a>
                <a href="<?php echo $base_url; ?>/solucoes">Soluções</a>
                <a href="<?php echo $base_url; ?>/cases">Cases</a>
                <a href="<?php echo $base_url; ?>/blog">Blog</a>
                <a href="<?php echo $base_url; ?>/sobre">Sobre</a>
                <a href="<?php echo $base_url; ?>/contato">Contato</a>
            </div>
        </nav>
    </header>
