<?php
// Detecta se o ambiente atual é o seu XAMPP local
$isLocal = ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_ADDR'] === '127.0.0.1');

if ($isLocal) {
    // Mantém o prefixo para os seus testes locais funcionarem no XAMPP
    $base_url = '/8ou80-marketing';
    $css_path = '/8ou80-marketing/public/assets/css/style.css';
} else {
    // Na Hostinger, removemos a barra absoluta inicial para o servidor ler a partir da pasta pública real
    $base_url = ''; 
    $css_path = 'assets/css/style.css'; // 🛠️ CORREÇÃO: Sem a barra inicial '/'
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>8ou80 Soluções Digitais | Da ideia ao resultado</title>
    
    <link rel="preconnect" href="https://googleapis.com">
    <link rel="preconnect" href="https://gstatic.com" crossorigin>
    <link href="https://googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Injeta o caminho correto calibrado para produção -->
   <!-- O parâmetro ?v=... força o navegador online a baixar o CSS novo imediatamente -->
<link rel="stylesheet" href="<?php echo $css_path; ?>?v=<?php echo time(); ?>">

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
