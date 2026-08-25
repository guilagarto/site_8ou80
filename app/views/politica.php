<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include __DIR__ . '/header.php'; 
?>

<main class="main-container">
    <!-- Cabeçalho da Página -->
    <header class="page-intro text-left-mobile">
        <span class="subtitle-badge">Transparência</span>
        <h1>Política de Privacidade</h1>
        <p class="meta-date">Última atualização: <?php echo date('d/m/Y'); ?></p>
    </header>

    <!-- Conteúdo Legal -->
    <article class="legal-content">
        <section class="legal-section">
            <h2>1. Informações Gerais</h2>
            <p>A <strong>8ou80</strong> valoriza a privacidade dos seus usuários. Esta Política de Privacidade descreve como coletamos, usamos, armazenamos e protegemos as informações pessoais fornecidas por você ao navegar no site <strong>8ou80.com</strong> ou ao utilizar nossos formulários de contato.</p>
        </section>

        <section class="legal-section">
            <h2>2. Coleta de Dados Pessoais</h2>
            <p>Nós coletamos apenas as informações essenciais enviadas voluntariamente por você por meio do nosso formulário na página de <em>Contato</em>, incluindo:</p>
            <ul>
                <li>Nome completo</li>
                <li>Endereço de e-mail</li>
                <li>Mensagem corporativa ou detalhes do projeto solicitado</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>3. Uso das Informações</h2>
            <p>Os dados coletados são utilizados estritamente para as seguintes finalidades:</p>
            <ul>
                <li>Responder a dúvidas, orçamentos e solicitações comerciais</li>
                <li>Prestar serviços contratados e suporte técnico</li>
                <li>Melhorar a experiência de navegação e desempenho do nosso site</li>
            </ul>
        </section>

        <section class="legal-section">
            <h2>4. Segurança dos Dados</h2>
            <p>Implementamos medidas técnicas e administrativas avançadas para proteger seus dados contra acessos não autorizados, perdas ou alterações. Nosso site conta com criptografia segura (SSL) para garantir que as informações trafeguem em total sigilo.</p>
        </section>

        <section class="legal-section">
            <h2>5. Seus Direitos</h2>
            <p>De acordo com a Lei Geral de Proteção de Dados (LGPD), você tem o direito de acessar, corrigir, atualizar ou solicitar a exclusão definitiva dos seus dados pessoais a qualquer momento. Para isso, basta entrar em contato conosco.</p>
        </section>
    </article>
</main>

<?php include __DIR__ . '/footer.php'; ?>
