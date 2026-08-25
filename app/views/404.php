<?php
// 1. Configurações de erro e importação do cabeçalho global
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/header.php';
?>

<!-- 2. Conteúdo exclusivo da Página 404 -->
<main class="main-container text-center-404">
    <div class="error-container">
        <!-- Badge Dourado de Alerta Sutil -->
        <span class="subtitle-badge">Erro 404</span>
        
        <!-- Título Principal de Impacto -->
        <h1 class="error-title">Página Não Encontrada</h1>
        
        <!-- Texto de Apoio Técnico e Humano -->
        <p class="error-text">
            O endereço que você tentou acessar não existe, foi removido ou mudou de lugar. 
            No ecossistema digital, preferimos focar no que gera resultados reais. 
            Use os caminhos abaixo para retornar à navegação segura.
        </p>

        <!-- Botões de Ação para o Usuário não ficar preso -->
        <div class="error-actions">
            <a href="/8ou80-marketing/" class="btn-primary">Voltar para o Início</a>
            <a href="contato" class="case-link" style="font-weight: 600;">Falar com o Suporte &rarr;</a>
        </div>
    </div>
</main>

<?php
// 3. Importação do rodapé global do site
require_once __DIR__ . '/footer.php';
?>
