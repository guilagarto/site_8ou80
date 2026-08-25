<?php
// Importa o cabeçalho agora na raiz de views
require_once __DIR__ . '/header.php';
?>

<main class="main-container">

    <header class="page-intro">
        <span class="subtitle-badge">Nossos Serviços</span>
        <h1>Soluções Digitais Inteligentes</h1>
        <p>Desenvolvemos a infraestrutura tecnológica e gerenciamos as estratégias de marketing necessárias para profissionalizar sua operação e escalar seu negócio.</p>
    </header>

    <!-- GRID DE SOLUÇÕES DINÂMICO -->
    <section class="features-grid">
        <?php if (!empty($todasSolucoes)): ?>
            <?php foreach ($todasSolucoes as $solucao): ?>
                <article class="feature-box" style="border-top: 3px solid var(--azul-metalico);">
                    <!-- Carrega a string/classe do ícone salva no banco -->
                    <div class="case-badge"><?= htmlspecialchars($solucao['icone']) ?></div>
                    
                    <h3><?= htmlspecialchars($solucao['titulo']) ?></h3>
                    <p><?= htmlspecialchars($solucao['descricao']) ?></p>
                    
                    <!-- Verifica se você cadastrou preço para exibir na tela -->
                    <?php if (!empty($solucao['preco']) && $solucao['preco'] > 0): ?>
                        <p style="margin-top: 10px; font-weight: 700; color: var(--texto-escuro);">
                            Investimento: R$ <?= number_format($solucao['preco'], 2, ',', '.') ?>
                        </p>
                    <?php endif; ?>
                    
                    <a href="contato" class="case-link" style="margin-top: 15px; display: inline-block;">Solicitar este serviço &rarr;</a>
                </article>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; color: var(--texto-mutado); width: 100%;">Nenhuma solução cadastrada no banco de dados.</p>
        <?php endif; ?>
    </section>

    <section class="hero-card border-top-azul" style="margin-top: 60px;">
        <span class="subtitle-badge">Projeto Sob Medida</span>
        <h2>Não encontrou a solução exata que o seu modelo de negócio precisa?</h2>
        <p>Nossa equipe está pronta para entender o seu problema, estruturar o planejamento estratégico correto e programar uma aplicação digital totalmente personalizada para o seu nicho.</p>
        <div class="cta-section" style="margin-top: 20px;">
            <a href="contato" class="btn-primary">Fale com um Especialista</a>
        </div>
    </section>

</main>

<?php
// Importa o rodapé agora na raiz de views
require_once __DIR__ . '/footer.php';
?>
